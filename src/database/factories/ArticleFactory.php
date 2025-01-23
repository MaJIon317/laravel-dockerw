<?php

namespace Database\Factories;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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

        $image = $this->dir . Str::of(fake()->image($dir, 310, 200, null, false))->after($this->dir);

        $banner = $this->dir . Str::of(fake()->image($dir, 1660, 415, null, false))->after($this->dir);

        return [
            'image' => $image,
            'banner' => $banner,
            'title' => fake()->title(),
            'description' => fake()->paragraphs(5, true),
            'meta_title' => fake()->title(),
            'meta_description' => fake()->text(),
            'meta_keywords' => fake()->title(),
            'slug' => fake()->slug(),
            'publish_date' => Carbon::now(),
            'status' => 1,
        ];
    }
}
