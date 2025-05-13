<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Team;


class ProductFactory extends Factory
{
   protected $model = Product::class;
    public function definition(): array
    {
        return [
            'product_name' => $this->faker->words(3, true),
            'description'  => $this->faker->paragraph(),
            'price'        => $this->faker->randomFloat(2, 10, 200),
            'gender'       => $this->faker->randomElement(['men','women','unisex']),
            'stock'        => $this->faker->numberBetween(0, 100), 
            'brand_id'     => Brand::inRandomOrder()->first()->id,
            'team_id'      => Team::inRandomOrder()->first()->id,
            'image_path' => 'https://picsum.photos/seed/'.$this->faker->unique()->numberBetween(1,1000).'/200/150',
        ];
    }
}
