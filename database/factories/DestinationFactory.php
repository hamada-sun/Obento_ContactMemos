<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ja_JP');

        $postalCode = $faker->postcode();
        $prefecture = $faker->prefecture();
        $city = $faker->city();
        $streetAddress = $faker->streetAddress();

        $fullAddress = "{$prefecture}{$city}{$streetAddress}";

        return [
            'postal_code' => $postalCode,
            'prefecture' => $prefecture,
            'city' => $city,
            'street_address' => $streetAddress,
            'building_name' => $faker->optional()->secondaryAddress(),
            'full_address' => $fullAddress,
            'is_billing_address' => $this->faker->boolean(80),
        ];
    }
}
