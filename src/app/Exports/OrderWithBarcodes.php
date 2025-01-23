<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderWithBarcodes implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            '№', 
            'Артикул',
            'Номенклатура'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }
}
