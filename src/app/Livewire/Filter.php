<?php

namespace App\Livewire;

use App\Filters\FilterCollection;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination; 
use Livewire\Attributes\Isolate;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\DiscountGroup;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

#[Isolate] 
class Filter extends Component
{
    use WithPagination;

    public ?Category $category = null;

    public $route;
    public $slug;
    public string $build = 'category';

    public array $filters = [];

    public function mount(Request $request)
    {     
        if ($this->build && !method_exists($this, 'build' . Str::ucfirst($this->build))) {
            abort(404);
        }

        $this->route = Route::currentRouteName();
        
        $this->slug = $this->slug ?? $this->category->slug;

        $filteres = app(FilterCollection::class)->filters();
    
        if ($filteres) {
            foreach ($filteres as $filtere) {
                $this->filters['filter'][$filtere->relatedField()] = $filtere->isMultiple() ? [] : null;

                if (isset($request->filters['filter'][$filtere->relatedField()])) {
                    if ($filtere->isMultiple()) {
                        $this->filters['filter'][$filtere->relatedField()] = array_merge($this->filters['filter'][$filtere->relatedField()], $request->filters['filter'][$filtere->relatedField()]);
                    } else {
                        $this->filters['filter'][$filtere->relatedField()] = $request->filters['filter'][$filtere->relatedField()];
                    }            
                }
            }
        }
    }

    private function filters()
    {
        
    }

    protected function queryString()
    {
        return [
            'filters',
        ];
    }


    private function buildCategory(Builder $builder): Builder
    {
        if ($this->category) {
            $builder->where('category_id', $this->category->id);
        }

        return $builder;
    }

    private function buildCompilationNew(Builder $builder): Builder
    {
        $builder->where('created_at', '>=', \Carbon\Carbon::now()->subDays((int)config('settings.new_day', 30)));

        return $builder;
    }

    private function buildCompilationHit(Builder $builder): Builder
    {
        $builder->where('hit', true);

        return $builder;
    }
 

    private function sorts($sorts = []) 
    {
        $result = [];

        $default_sorts = array();

        foreach (config('general.category_sorts.default') as $sort) {
            $default_sorts[] = (object) array(
                'title' => __('sort.' . $sort),
                'value' => $sort
            );
        }

        $default_sorts = collect($default_sorts);
    
        if ($sorts) {
            foreach ($sorts as $sort) {
                if (in_array($sort, config('general.category_sorts.all'))) {
                    $result[] = (object) array(
                        'title' => __('sort.' . $sort),
                        'value' => $sort
                    );
                }
            }

            $result = collect($result);
        } else {
            $result = $default_sorts;
        }

        if ($result) {
            $result->first()->title = __('sort.default');

            $this->sort_default = $result->first()->value;
        }

        return $result;
    }

    public function updated($name, $value) 
    {
        $this->resetPage();
    }
 
    public function placeholder()
    {
        return <<<'HTML'
        <div>
            wwwwwwwwwwwwwwwwwwwwwwwwww
        </div>
        HTML;
    }
    public function render()
    {
        $products = Product::status()
            ->where(function (Builder $query) {
                $query = $this->{'build' . Str::ucfirst($this->build)}($query);
            })
            ->filtered($this->filters)
            ->groupBy('products.id')
            ->paginate(config('settings.page_limit', 10))->withQueryString();

        
        if ($this->category && count($this->category->filters) > 0) {
            foreach(app(\App\Filters\FilterCollection::class)->filters() as $key => $filters) {
                if ($filters->isFilter() && !$this->category->filters->where('filter_id', $filters->isFilter())->first()) {
                    app(FilterCollection::class)->removeFilters($key);
                }
            }

        }

        $filteres = app(FilterCollection::class)->filters();
   
        return view('components.filter', compact('products', 'filteres'));
    }
}
