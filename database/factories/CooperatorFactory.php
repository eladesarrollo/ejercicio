<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cooperator>
 */
class CooperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'      => fake()->name(),
            'email'     => fake()->safeEmail(),
            'address'   => fake()->address(),
            'phone'     => fake()->phoneNumber()
        ];
    }
}
