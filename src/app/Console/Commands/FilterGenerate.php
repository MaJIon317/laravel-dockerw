<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeProduct;

use App\Models\Filter;
use App\Models\FilterTranslation;
use App\Models\FilterValue;
use App\Models\FilterValueTranslation;
use App\Models\FilterValueProduct;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class FilterGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:filter-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $attributes = array();

    /**
     * Execute the console command.
     */
    public function handle()
    {
        FilterValueProduct::truncate();

        AttributeProduct::chunk(6500, function($results) {
            $filter_value_products = array();
            
            foreach($results as $result) {
                if (!isset($this->attributes['filter'][$result->attribute_id])) {
                    if (!$model = Filter::where('slug', Str::slug($result->attribute->name, '-'))->first()) {
                        $model = Filter::create([
                            'type' => 'checkbox',
                            'slug' => Str::slug($result->attribute->name, '-'),
                            'order' => 0,
                            'status' => 1
                        ]);

                        foreach (config('app.locales', ['ru']) as $locale) {
                            FilterTranslation::create([
                                'filter_id' => $model->id,
                                'locale' => $locale,
                                'name' => $result->attribute->name,
                                'description' => ''
                            ]);
                        }
                    }

                    $this->attributes['filter'][$result->attribute_id] = array(
                        'id' => $model->id,
                        'name' => $result->attribute->name,
                    );
                }

                $value_md5 = md5($result->value);

                if (!isset($this->attributes['filter_values'][$value_md5])) {
                    if (!$model = FilterValue::where('slug', Str::slug($result->value, '-'))->first()) {
                        $model = FilterValue::create([
                            'filter_id' => $this->attributes['filter'][$result->attribute_id]['id'],
                            'slug' => Str::slug($result->value, '-'),
                            'order' => 0,
                            'status' => 1
                        ]);

                        foreach (config('app.locales', ['ru']) as $locale) {
                            FilterValueTranslation::create([
                                'filter_value_id' => $model->id,
                                'locale' => $locale,
                                'name' => $result->value,
                                'description' => ''
                            ]);
                        }
                    }

                    $this->attributes['filter_values'][$value_md5] = array(
                        'id' => $model->id,
                        'name' => $result->value,
                    );
                }

                $filter_value_products[] = array(
                    'filter_value_id' => $this->attributes['filter_values'][$value_md5]['id'],
                    'product_id' => $result->product_id,
                );
            }

            FilterValueProduct::insertOrIgnore($filter_value_products);
        });
    }
}
