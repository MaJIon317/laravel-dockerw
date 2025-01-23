<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DiscountGroup;
use App\Models\DiscountGroupValue;
use App\Models\Holiday;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
 
        $categories = Category::factory()->count(5)->create();

        $discount_group_ids = array();

        for ($i=1; $i < 4; $i++) { 
            $discount_group = DiscountGroup::factory()->create([
                'title' => $i
            ]);

            $discount_group_ids[$discount_group->id] = $discount_group->id;

            for ($i2=0; $i2 < 5; $i2++) { 
                DiscountGroupValue::factory()->create([
                    'discount_group_id' => $discount_group->id,
                    'percent' => $i2,
                    'amount' => $i2 * 100
                ]);
            }
        }

        foreach ($categories as $category) {
            Holiday::factory()->create([
                'category_id' => $category->id
            ]);
 
            Product::factory()->create([
                'category_id' => $category->id,
                'discount_group_id' => array_rand($discount_group_ids)
            ]);
        }
    }
}
