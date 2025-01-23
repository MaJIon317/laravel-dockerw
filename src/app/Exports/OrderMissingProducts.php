<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderMissingProducts implements ShouldAutoSize, WithColumnWidths, FromCollection, WithHeadings
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function headings(): array
    {
        return [
            '№', 
            'Артикул',
            'Номенклатура'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,         
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $collection = array();

        $products = $this->order->products->where('absent', 1);

        foreach ($products as $count => $product) {
            $count++;

            $collection[] = (object) [
                ((int)$count + 1),
                $product->product->article,
                $product->product->title,
            ];
        }

        return collect($collection);
    }
}
