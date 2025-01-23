<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Holiday extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title',
        'image',
        'month',
        'day',
        'category_id',
    ];

    public function scopeHolidays()
    {
        return DB::select('(SELECT `c`.`slug`, `h`.* FROM `holidays` `h` LEFT JOIN `categories` `c` ON(`h`.`category_id` = `c`.`id`) WHERE `h`.`month` >= MONTH(NOW()) AND IF((`h`.`month` = MONTH(NOW()) AND `h`.`day` >= DAYOFMONTH(NOW())) OR `h`.`month` > MONTH(NOW()), 1, 0) ORDER BY `h`.`month`, `h`.`day` ASC) UNION DISTINCT (SELECT `c`.`slug`, `h`.* FROM `holidays` `h` LEFT JOIN `categories` `c` ON(`h`.`category_id` = `c`.`id`) WHERE `h`.`month` <= MONTH(NOW()) AND IF((`h`.`month` = MONTH(NOW()) AND `h`.`day` <= DAYOFMONTH(NOW())) OR `h`.`month` < MONTH(NOW()), 1, 0) ORDER BY `h`.`month`, `h`.`day` ASC)');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}



 