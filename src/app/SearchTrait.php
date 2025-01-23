<?php

namespace App;

trait SearchTrait
{
    private function buildWildCards($term) {
        if ($term == "") {
            return $term;
        }

        // Strip MySQL reserved symbols
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);
        foreach($words as $idx => $word) {
            // Add operators so we can leverage the boolean mode of
            // fulltext indices.
            $words[$idx] = "'+" . $word . "*'";
        }
        $term = implode(' ', $words);
        return $term;
    }
 
    protected function scopeSearch($query, $term) {
        $fillables = (new self())->getFillable();

        foreach ($this->searchable as $key => $fillable) {
            if (!in_array($fillable, $fillables)) {
                unset($this->searchable[$key]);
            }
        }

        $columns = implode(',', $this->searchable ?? []);

        if ($columns) {
            $query->whereRaw(
                "MATCH ({$columns}) AGAINST (? IN BOOLEAN MODE)",
                $this->buildWildCards($term)
            );
        }

        return $query;
    }
}
