<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\OrderStatusEnum;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Order::class;
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->uuid,
            'user_id' => User::factory(),
            'status'=> OrderStatusEnum::class,
            'delivery_address' => $this->faker->address,
        ];
    }
}
