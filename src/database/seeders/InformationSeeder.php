<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['about', 'delivery', 'contact', 'terms', 'policy'] as $slug) {
            Information::factory()->create([
                'slug' => $slug
            ]);
        }
    }
}
