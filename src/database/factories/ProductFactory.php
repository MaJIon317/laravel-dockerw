<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    private $dir = 'demo/';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = array();

        $dir = (config('filesystems.disks.public.root') ?? storage_path('app/images')) . '/' . config('settings.resize_image_path', 'image') . '/' . $this->dir;

        if (!File::isDirectory($dir)) {
            Storage::makeDirectory(Str::of($dir)->after('app/'));
        }

        $images[] = $this->dir . Str::of(fake()->image($dir, 415, 415, null, false))->after($this->dir);
        $images[] = $this->dir . Str::of(fake()->image($dir, 415, 415, null, false))->after($this->dir);

        return [
            'category_id' => Category::factory()->create(),
            'discount_group_id' => null,
            'article' => fake()->postcode(),
            'barcode' => fake()->postcode(),
            'images' => $images,
            'price' => fake()->numberBetween(0, 13),
            'discount' => fake()->numberBetween(0, 13), 
            'minimum' => 1,
            'stock' => fake()->numberBetween(0, 120),
            'title' => fake()->title(),
            'description' => fake()->paragraphs(5, true),
            'meta_title' => fake()->title(),
            'meta_description' => fake()->text(),
            'meta_keywords' => fake()->title(),
            'video' => null,
            'marketplace' => [
                'ozon' => fake()->url(),
                'wb' => fake()->url(),
            ],
            'slug' => fake()->slug(),
            'hit' => 1,
            'status' => 1,
        ];
    }
}