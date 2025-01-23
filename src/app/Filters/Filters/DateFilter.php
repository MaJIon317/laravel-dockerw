<?php
namespace App\Filters\Filters;

use App\Filters\FilterBase;
use App\Filters\FilterContract;
use Illuminate\Database\Eloquent\Builder;

class DateFilter extends FilterBase implements FilterContract
{
    protected static string $type = 'date';
}