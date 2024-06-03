<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'user_id' => User::factory(),
            'client_id' => Client::factory(),
            'discount_id' => 1,
            'start_order' => $this->faker->dateTimeThisYear('+2 months'),
            'duration' => $this->faker->numberBetween(30, 60),
            'payment_status' => $this->faker->boolean
        ];
    }
}
