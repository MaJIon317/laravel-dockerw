<?php

namespace App\Models;

use App\SearchTrait;
use App\SlugTrait;
use App\AttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;
use App\Filters\FilterCollection;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;

use App\Exchanges\OneC\Interfaces\ProductInterface;

class Product extends Model implements ProductInterface
{
    use HasFactory, SearchTrait, SlugTrait, AttributeTrait;

    protected $searchable = [
        'title',
        'description',
        'barcode',
        'article'
    ];
    
    public $labelNew = 30;

    protected $fillable = [
        'category_id',
        'article',
        'barcode',
        'images',
        'discount_group_id',
        'price',
        'discount',
        'minimum',
        'stock',
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'video',
        'marketplace',
        'slug',
        'hit',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'marketplace' => 'array',
            'status' => 'integer',
        ];
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function scopeNotStatus($query)
    {
        return $query->where('status', 0);
    }

    public function scopeLabelNew()
    {
        return Carbon::parse($this->created_at)->diffInDays(Carbon::now()) <= $this->labelNew ? true : false;
    }

    public function scopeLabelHit()
    {
        return $this->hit ? true : false;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(AttributeProduct::class);
    }

    public function scopeFiltered(Builder $query, array $filters = []): Builder
    {
        $query = $query->leftJoin('filter_value_products', 'products.id', 'filter_value_products.product_id');

        foreach (app(FilterCollection::class)->filters() as $filter) {
            $filter->setFilters($filters);

            $query = $filter->apply($query);
        }

        return $query;
    }

    // 1c
    /**
     * Если по каким-то причинам файлы import.xml или offers.xml были модифицированы и какие-то данные
     * не попадают в парсер, в самом конце вызывается данный метод, в $product и $cml можно получить все
     * возможные данные для ручного парсинга.
     *
     * @param CommerceML $cml
     * @param Product $product
     *
     * @return void
     */
    public function setRaw1cData($cml, $product)
    {
        //
    }

    /**
     * Установка реквизитов, (import.xml > Каталог > Товары > Товар > ЗначенияРеквизитов > ЗначениеРеквизита)
     * $name - Наименование
     * $value - Значение.
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function setRequisite1c($name, $value)
    {
       // dd('setRequisite1c', $name, $value);
    }

    /**
     * Предполагается, что дерево групп у вас уже создано
     *
     * @param \App\Exchanges\OneC\Commerce\Model\Group $group
     *
     * @return mixed
     */
    public function setGroup1c($group)
    {
        return null;
    }

    /**
     * import.xml > Классификатор > Свойства > Свойство
     * $property - Свойство товара.
     *
     * import.xml > Классификатор > Свойства > Свойство > Значение
     * $property->value - Разыменованное значение (string)
     *
     * import.xml > Классификатор > Свойства > Свойство > ВариантыЗначений > Справочник
     * $property->getValueModel() - Данные по значению, Ид значения, и т.д
     *
     * @param string $property_id
     * @param string $value
     *
     * @return void
     */
    public function setProperty1c($property_id, $value)
    {
        return null;
    }

    /**
     * @param string $path
     * @param string $caption
     *
     * @return void
     */
    public function addImage1c($path, $caption)
    {
        //dd('addImage1c', $path, $caption, $this);
    }

    /**
     * @return GroupInterface
     */
    public function getGroup1c()
    {
        dd('getGroup1c');
    }

    /**
     * Создание всех свойств продутка
     * import.xml > Классификатор > Свойства.
     *
     * $properties[]->availableValues - список доступных значений, для этого свойства
     * import.xml > Классификатор > Свойства > Свойство > ВариантыЗначений > Справочник
     *
     * @param $properties
     * @param string $source_id
     *
     * @return mixed
     */
    public static function createProperties1c($properties, string $source_id)
    {
        foreach ($properties as $property) {
            $propertyModel = Property::createByMl($property);
           
            foreach ($property->getAvailableValues() as $value) {
                if (!$propertyValue = PropertyValue::where('exchange_1c', (string)$value->ИдЗначения)->first()) {
                    $propertyValue = new PropertyValue();

                    $propertyValue->property_id = $propertyModel->id;
                    $propertyValue->name = (string)$value->Значение;
                    $propertyValue->exchange_1c = (string)$value->ИдЗначения;

                    $propertyValue->save();

                    unset($propertyValue);
                }
            }

            unset($propertyModel);
        }
    }

    /**
     * @param Offer $offer
     *
     * @return OfferInterface
     */
    public function getOffer1c($offer)
    {
        dd('getOffer1c', $offer);
    }

    /**
     * @param Product $product
     * @param string $source_id
     *
     * @return self
     */
    public static function createModel1c($product, $source_id)
    {
        if (empty(trim($product->Артикул))) {
            return false;
        }

        if (!$model = static::findProductBy1c($product->id, $source_id)) {
            $model = new Product();
            $model->exchange_1c = $product->id;
        }

        $category = Category::select('id')->where('exchange_1c', $product->getGroup())->first();
        
        $model->category_id = $category->id ?? null;

        $model->article = (string)$product->Артикул;
        $model->barcode = (string)$product->Штрихкод;

        $model->video = '';

        $model->minimum = 1;
        $model->stock = (int)($model->stock ?? $product->БазоваяЕдиница ?? 0);

        $model->price = $model->price ?? 0;
        $model->discount = $model->discount ?? 0;

        $model->title = (string)$product->name;
        $model->description = (string)$product->Описание;

        $model->meta_title = 'Купить ' . (string)$product->name . '';
        $model->meta_description = (string)$product->Описание;
   
        $model->uploading_images = null;
        
        
        $attributes = array();
        
        $config_properties = config('exchange.properties', []);
        $config_attributes = config('settings.1c_exchange.property_to_attribute', []);

        foreach($product->properties as $property) {
            if ($property->value) {
                $propertyModel = Property::where('exchange_1c', $property->id)->first();

                if ($propertyModel) {
                    $propertyValueModel = PropertyValue::where('exchange_1c', $property->value)->first();

                    $propertyValue = $propertyValueModel->name ?? $property->value;

                    $array_search = array_search($property->id, $config_properties);

                    if ($array_search !== false) {

                        if ($array_search == 'discount_group_id') {
                            $search = preg_replace('/[^0-9]/', '', $propertyValue);

                            $discount_group = DiscountGroup::where('title', $search)->first();

                            if ($discount_group) {
                                $propertyValue = $discount_group->id;
                            } else {
                                $array_search = null;
                            }
                        }

                        if ($array_search == 'minimum') {
                            $propertyValue = (int)$propertyValue;
                        }

                        if ($array_search == 'status') {
                            $propertyValue = (int)str_replace(['Да', 'Нет'], [1, 0], $propertyValue);
                        }

                        if ($array_search) {
                            $model->{$array_search} = $propertyValue;
                        }
                    }

                    // Свойства == характеристики
                    $array_search = array_search($property->id, $config_attributes);

                    if ($array_search !== false) {
                        $attributes[$property->id] = array(
                            'name' => $propertyModel->name,
                            'value' => $propertyValue
                        );
                    }

                }
            }
        }

        if (!$model->category_id) {
            $model->status = 0;
        }

        if ((string)$product->ПометкаУдаления == 'true') {
            $model->status = 0;
        }

        $model->save();
    
        //
        $model->attributes()->delete();

        foreach ($attributes as $exchange_1c => $attribute) {
            $attributeModel = Attribute::select('id')->where('exchange_1c', $exchange_1c)->first();

            if (!$attributeModel) {
                $attributeModel = new Attribute();

                $attributeModel->name = $attribute['name'];
                $attributeModel->exchange_1c = $exchange_1c;

                $attributeModel->save();
            }

            $model->attributes()->insert(array(
                'attribute_id' => $attributeModel->id,
                'product_id' => $model->id,
                'value' => $attribute['value']
            ));

        }

        return $model;
    }

    /**
     * @param string $id
     * @param string $source_id
     * @return ProductInterface|null
     */
    public static function findProductBy1c(string $id, string $source_id): ?self
    {
        return self::where('exchange_1c', $id)->first();
    }

    public static function createPriceTypes1c($priceTypes, $source_id)
    {
        foreach ($priceTypes as $priceType) {
            //
        }
    }

    /**
      * @param string $price
     */
    public function updatePrice1c($price)
    {
        $this->price = 0;
        $this->discount = 0;

        foreach ($price->Цена as $item) {
            if ('ad29b096-7343-11e8-82b1-be1bb4705fe6' == $item->ИдТипаЦены) {
                $this->price = (float)$item->ЦенаЗаЕдиницу;
            } elseif ('9366ed08-1da2-11ea-9a1c-be1bb4705fe6' == $item->ИдТипаЦены) {
                $this->discount = (float)$item->ЦенаЗаЕдиницу;
            }
        }

        $this->save();

        return $this;
    }

     /**
      * @param array $stock
     */
    public function updateRest1c($stock)
    {
        $this->stock = (int)$stock->Количество;
    
        $this->save();

        return $this;
    }
} 