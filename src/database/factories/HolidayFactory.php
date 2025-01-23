<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holiday>
 */
class HolidayFactory extends Factory
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

        $image = $this->dir . Str::of(fake()->image($dir, 260, 260, null, false))->after($this->dir);

        return [
            'title' => fake()->title(),
            'image' => $image,
            'month' => fake()->numberBetween(1, 12),
            'day' => fake()->numberBetween(1, 30),
        ];
    }
}