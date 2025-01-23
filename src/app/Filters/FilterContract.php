<?php
namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface FilterContract
{
    /**
     * @param Builder $query
     *
     * @return mixed
     */
    public function apply(Builder $query);
}