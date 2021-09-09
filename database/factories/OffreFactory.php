<?php

namespace Database\Factories;

use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offre::class;

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
            'user_id'   => $this->faker->numberBetween(1, 15),

            'category_id'   => $this->faker->numberBetween(1, 15),
        ];
    }
}
