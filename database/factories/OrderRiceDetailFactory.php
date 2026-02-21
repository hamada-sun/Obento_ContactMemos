<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderRiceDetail>
 */
class OrderRiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $orderId = Order::inRandomOrder()->first()?->id ?? 1;

        return [
            'order_id' => $orderId, // 必須
            'rice_size_id' => $this->faker->numberBetween(0, 2), // 0='普通盛'
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}
