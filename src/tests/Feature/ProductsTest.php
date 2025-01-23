<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_categories_empty_table(): void
    {
        $response = $this->get('/catalog')
            ->assertStatus(200)
            ->assertDontSee(__('No categories found'));
    }

}
