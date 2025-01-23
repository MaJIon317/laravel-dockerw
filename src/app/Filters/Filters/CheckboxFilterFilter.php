<?php
namespace App\Filters\Filters;

use App\Filters\FilterBase;
use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class CheckboxFilterFilter extends FilterBase implements FilterContract
{
    protected static string $view = 'checkbox';

    public function apply(Builder $query): Builder
    {
        if (is_null($this->requestValue())) {
            return $query;
        }
      
        return $query->whereIn('filter_value_products.filter_value_id', $this->requestValue());
    }
}