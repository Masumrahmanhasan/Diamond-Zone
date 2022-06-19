<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(20)->create();
        Product::factory(30)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(1)->admin()->create();
    }
}
