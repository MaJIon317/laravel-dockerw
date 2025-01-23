<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

if (!function_exists('sorts')) {
    function sorts(array $sorts) 
    {
        $results = [];

		$default_sorts = collect([
            (object) [
                'title' => __('sort.date_desc'),
                'value' => 'created_atDESC'
            ], (object) [
                'title' => __('sort.price_asc'),
                'value' => 'priceASC'
            ], (object) [
                'title' => __('sort.view_desc'),
                'value' => 'viewASC'
            ], (object) [
                'title' => __('sort.alphabet_asc'),
                'value' => 'titleASC'
            ], (object) [
                'title' => __('sort.stock_desc'),
                'value' => 'stockDESC'
            ]
        ]);

        if ($sorts) {
            foreach ($default_sorts as $default_sort) {
                if (in_array($default_sort->sort, $sorts)) {
                    $results[] = $default_sort;
                }
            }
        } else {
            $results = $default_sorts;
        }
 
        if ($results) {
            $results->first()->title = __('sort.default');
        }

		return $results;
    }
}