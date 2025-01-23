<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Article;
use App\Models\Information;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            CouponSeeder::class,
            ProductSeeder::class,
            NewsSeeder::class,
            ArticleSeeder::class,
            InformationSeeder::class,
        ]);
    } // php artisan migrate:fresh --seed
}
