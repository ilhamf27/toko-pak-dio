<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->uuid,
            'name' => $this->faker->unique()->text(20),
            'description' => $this->faker->text(180),
            'stock_qty' => $this->faker->numberBetween(0,250),
            'price' => $this->faker->numberBetween(10000,100000),
        ];
    }
}
