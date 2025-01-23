<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    private $dir = 'demo/';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dir = (config('filesystems.disks.public.root') ?? storage_path('app/images')) . '/' . config('settings.resize_image_path', 'image') . '/' . $this->dir;

        if (!File::isDirectory($dir)) {
            Storage::makeDirectory(Str::of($dir)->after('app/'), 0755, true);
        }

        $banner = $this->dir . Str::of(fake()->image($dir, 1660, 310, null, false))->after($this->dir);
        
        return [
            'title' => fake()->title(),
            'description' => fake()->paragraphs(5, true),
            'icon' => null,
            'banner' => $banner,
            'meta_title' => fake()->text(),
            'meta_description' => fake()->text(),
            'meta_keywords' => str_replace(' ', ', ', fake()->words(rand(1, 4), true)),
            'slug' => fake()->slug(),
        ];
    }
}