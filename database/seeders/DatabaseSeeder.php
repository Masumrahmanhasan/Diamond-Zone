<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Pendant',
                'slug' => 'pendant',
                'featured_image' => 'frontend_asset/images/shopByCategory1.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Earrings',
                'slug' => 'earrings',
                'featured_image' => 'frontend_asset/images/shopByCategory2.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Finger Ring',
                'slug' => 'finger-ring',
                'featured_image' => 'frontend_asset/images/shopByCategory3.jpg',

            ],
            [
                'id' => 4,
                'name' => 'Nose Pin',
                'slug' => 'nose-pin',
                'featured_image' => 'frontend_asset/images/shopByCategory4.jpg',
            ],
            [
                'id' => 5,
                'name' => 'Gold Items',
                'slug' => 'gold-items',
                'featured_image' => 'frontend_asset/images/shopByCategory5.jpg',
            ]
        ]);
        // Product::factory(30)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(1)->admin()->create();


    }
}
