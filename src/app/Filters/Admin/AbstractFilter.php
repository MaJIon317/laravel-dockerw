<?php
namespace App\Filters\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter
{
    protected $request;

    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder)
    {
        $filters = $this->getFilters();
 
        foreach ($filters as $filter => $value) {
            $this->resolveFilter($filter)->filter($builder, $value);
        }

        return $builder;
    }

    protected function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }
}