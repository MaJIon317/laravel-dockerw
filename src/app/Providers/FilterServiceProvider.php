<?php

namespace App\Providers;

use App\Models\Filter;
use App\Filters\FilterCollection;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class FilterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FilterCollection::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $model = DB::select("SELECT `fv`.`id`, `fv`.`filter_id`, `fvp`.`filter_value_id`, `fvt`.`name`, COUNT(`fvp`.`product_id`) as `count` FROM `products` `p` LEFT JOIN `filter_value_products` `fvp` ON(`p`.`id` = `fvp`.`product_id`) LEFT JOIN `filter_values` `fv` ON(`fvp`.`filter_value_id` = `fv`.`id`)  LEFT JOIN `filter_value_translations` `fvt` ON(`fv`.`id` = `fvt`.`filter_value_id`) WHERE `p`.`category_id` = '1' AND `p`.`status` = '1'  AND `fvt`.`locale` = 'ru' GROUP BY `fv`.`id` ORDER BY `fv`.`order` DESC, `fvt`.`name` ASC");

        $filter_values = array();

        foreach ($model as $filter) {
            $filter_values[$filter->filter_id][$filter->filter_value_id] = array(
                'label' => $filter->name,
                'value' => $filter->filter_value_id,
            );
        }

        $filters = Filter::all();
 
        $registerFilters = array();

        foreach ($filters as $filter) {
            if (isset($filter_values[$filter->id])) {
                $filter_type = ucfirst($filter->type);
           
                $make = "\App\Filters\Filters\\{$filter_type}FilterFilter"::make(
                        label: $filter->name, 
                        field: 'filter.' . $filter->id,
                        relatedField: $filter->id,
                        values: $filter_values[$filter->id]
                    )
                    ->multiple($filter->type === 'radio' ? false : true)->filter($filter);

                $registerFilters[] = $make;
            }
        }

        app(FilterCollection::class)->registerFilters($registerFilters);
    }
}
