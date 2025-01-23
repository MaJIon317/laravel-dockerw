<?php
namespace App\Filters;

class FilterCollection
{
    protected array $filters = [];

    public function registerFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    public function removeFilters(int $key): void
    {
        if (isset($this->filters[$key])) {
            unset($this->filters[$key]);
        }
    }

    public function filters(): array
    {
        return $this->filters;
    }
}