<?php
namespace App\Filters;

use Closure;
use App\Models\Filter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Stringable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class FilterBase
{
    protected string $label;

    protected string $field;

    protected string|null $relatedField;

    protected bool $multiple = false;

    protected array $filters = [];

    protected int|null $filter = null;
    
    protected Closure|null $customQuery = null;

    protected array $attributes = [];

    protected static string $view = 'input';

    protected static string $type = 'text';

    public function __construct(string $label, string $field, string|null $relatedField = null, array $values = [])
    {
        $this->setLabel($label);
        $this->setField($field);
        $this->setRelatedField($relatedField);
        $this->setValues($values);
    }

    public static function make(...$arguments): static
    {
        return new static(...$arguments);
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function label(): string
    {
        return str($this->label)->ucfirst();
    }

    public function setField(string $field): static
    {
        $this->field = $field;

        return $this;
    }

    public function field(): string
    {
        return $this->field;
    }

    public function setRelatedField(string|null $relatedField): static
    {
        $this->relatedField = $relatedField;

        return $this;
    }

    public function relatedField(): string|null
    {
        return $this->relatedField;
    }
    
    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }

    public function values(): Collection
    {
        return collect($this->values);
    }

    public function hasValues(): bool
    {
        return $this->values()->isNotEmpty();
    }

    public function name(): string
    {
        return (string) str("filters.{$this->field()}")
            ->when($this->isMultiple(), fn(Stringable $str) => $str->append(""));
    }

    public function id(string $value = null): string
    {
        return (string) str($this->field())
            ->snake()
            ->prepend('filters_')
            ->when($value, fn(Stringable $str) => $str->append("_$value"));
    }

    public function type(): string
    {
        return static::$type;
    }

    public function attributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function attribute(string $name): string
    {
        return $this->attributes[$name] ?? '';
    }

    public function view(): string
    {
        return static::$view;
    }

    public function getCustomQuery(): Closure|null
    {
        return $this->customQuery;
    }

    public function hasCustomQuery(): bool
    {
        return !is_null($this->customQuery);
    }
 
    public function customQuery(Closure|null $customQuery): static
    {
        $this->customQuery = $customQuery;

        return $this;
    }

    public function multiple($status = true): static
    {
        $this->multiple = $status;
        
        return $this;
    }

    public function isMultiple(): bool
    {
        return $this->multiple;
    }

    public function filter(Filter $filter): static
    {
        $this->filter = $filter->id;
        
        return $this;
    }

    public function isFilter(): int|null
    {
        return $this->filter;
    }

    public function requestValue($param = null): string|array|null
    {
        $pathDot = (string) str('filters')
            ->append(".{$this->field()}")
            ->when($param, fn(Stringable $str) => $str->append(".$param"));
        
        return Arr::get($this->filters, $pathDot);
    }

    public function setFilters(array $filters = []): void
    {
        // Не используем Str::dot(), потому что нам надо выбрать массивы данных иначе
        $this->filters = $this->dot($filters);
    }

    private function dot($arr)
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator($arr),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        $path = [];
        $flatArray = [];

        foreach ($iterator as $key => $value) {
            $path[$iterator->getDepth()] = $key;

            if (!is_array($value)) {
                if ($this->isMultiple() && $value) {
                    $flatArray['filters.' . 
                        implode('.', array_slice($path, 0, $iterator->getDepth()))
                    ][$value] = $value;
                } else {
                    $flatArray['filters.' .
                        implode('.', array_slice($path, 0, $iterator->getDepth() + 1))
                    ] = $value;
                }
            }
        }

        return $flatArray;
    }

    public function render(): Factory|View|Application
    {
        return view('filters.' . $this->view(), ['filter' => $this]);
    }

    public function apply(Builder $query): Builder
    {
        if (is_null($this->requestValue())) {
            return $query;
        }

        if ($this->hasCustomQuery()) {
            $query = $query->where($this->getCustomQuery());
        } elseif ($this->relatedField()) {
            $query = $query->whereHas($this->field(), function(Builder $q) {
                return is_array($this->requestValue())
                    ? $q->whereIn($this->relatedField(), $this->requestValue())
                    : $q->where($this->relatedField(), $this->requestValue());
            });
        } elseif (is_array($this->requestValue())) {
            $query = $query->whereIn($this->field(), $this->requestValue());
        } else {
            $query = $query->where($this->field(), $this->requestValue());
        }
 
        return $query;
    }


}