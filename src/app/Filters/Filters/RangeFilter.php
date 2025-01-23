<?php
namespace App\Filters\Filters;

use App\Filters\FilterBase;
use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class RangeFilter extends FilterBase implements FilterContract
{
    protected static string $view = 'range';

    public function apply(Builder $query): Builder
    {
        if (is_null($this->requestValue())) {
            return $query;
        }

        if (is_array($this->relatedField())) {
            return $query->whereHas($this->field(), function(Builder $q) {
                $q->whereBetween(
                    $this->relatedField(),
                    [$this->requestValue('min'), $this->requestValue('max')]
                );
            });
        }

        return $query->whereBetween(
            $this->field(),
            [$this->requestValue('min'), $this->requestValue('max')]
        );
    }

}