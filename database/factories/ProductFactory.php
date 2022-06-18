<?php
declare(strict_types=1);
namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => 'DZ-'. rand(10000, 90000),
            'category_id' => Category::factory(),
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->sentence(),
            'thumbnail' => rand(1, 10),
            'gallary' => rand(1, 10),
            'price' => $this->faker->numberBetween($min = 1500, $max = 6000),
        ];
    }
}
