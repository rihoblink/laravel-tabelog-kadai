<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->realText(50, 5),
            'price' => fake()->numberBetween(100, 200000),
            'hours' => fake()->realText(50, 5),
            'code' => fake()->postcode(),
            'address' => fake()->prefecture().fake()->streetAddress(),
            'phone' => fake()->phoneNumber(),
            'holiday' => fake()->realText(50, 5),
            'category_id' => 1,
        ];
    }
}
