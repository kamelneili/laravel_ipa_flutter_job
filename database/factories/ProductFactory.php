<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'content'   => $this->faker->text(400),
            'featured_image'    => $this->faker->imageUrl(), //->default('https://picsum.photos/200/200'),
            'price' => $this->faker->numberBetween(1, 100000),
            'oldPrice' => $this->faker->numberBetween(1, 100000),

            'category_id'   => $this->faker->numberBetween(1, 15),
        ];
    }
}
