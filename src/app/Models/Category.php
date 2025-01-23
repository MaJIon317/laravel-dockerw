<?php

namespace App\Models;

use App\SearchTrait;
use App\SlugTrait;
use App\AttributeTrait;

use App\Exchanges\OneC\Interfaces\GroupInterface;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements GroupInterface
{
    use HasFactory, SearchTrait, SlugTrait, AttributeTrait;

    protected $searchable = [
        'title',
        'description',
    ];
    
    protected $fillable = [
        'title',
        'description',
        'icon',
        'banner',
        'meta_title',
        'meta_description', 
        'meta_keywords',
        'parent_id',
        'slug',
        'sorts'
    ];

    protected function casts(): array
    {
        return [
            'sorts' => 'array',
        ];
    }
 
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while(!is_null($parent)) {

            $parents->push($parent);

            $parent = $parent->parent;

        }

        return $parents;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function filters(): HasMany
    {
        return $this->hasMany(FilterCategory::class);
    }



    // 1c Exchange
    /**
     * Создание дерева групп
     * в параметр передаётся массив всех групп (import.xml > Классификатор > Группы)
     * $groups[0]->parent - родительская группа
     * $groups[0]->children - дочерние группы.
     *
     * @param Group[] $groups
     * @param string $source_id
     *
     * @return void
     */
    public static function createTree1c($groups, $source_id)
    {
        foreach ($groups as $group) {
            self::createByML($group);

            if ($children = $group->getChildren()) {
                self::createTree1c($children, $source_id);
            }
        }
    }

    /**
     * Создаём группу по модели группы CommerceML
     * проверяем все дерево родителей группы, если родителя нет в базе - создаём
     *
     * @param \App\Exchanges\OneC\Commerce\Model\Group $group
     * @return Group|array|null
     */
    public static function createByML(\App\Exchanges\OneC\Commerce\Model\Group $group)
    {
        /**
         * @var \App\Exchanges\OneC\Commerce\Model\Group $parent
         */
        if (!$model = static::where('exchange_1c', $group->id)->first()) {
            $model = new self;
            $model->exchange_1c = $group->id;
        }
      
        $model->title = $group->name;

        $model->meta_title = 'Купить ' . $group->name;

        if ($parent = $group->getParent()) {
            $parentModel = self::createByML($parent);

            $model->parent_id = $parentModel->id;

            unset($parentModel);
        } else {
            $model->parent_id = null;
        }

        $model->save();

        return $model;
    }

}
