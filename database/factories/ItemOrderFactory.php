<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemOrderFactory extends Factory
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
            'order_id' => Order::factory(),
            'item_id' => Item::factory(),
            'qty' => $this->faker->numberBetween(1,5)
        ];
    }
}
