<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->numberBetween(10000000, 44000000),
            'id_com' => 1,
            'id_reg' => 1,
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->firstname(),
            'last_name' => $this->faker->lastname(),
            'address' => null,
            'date_reg' => $this->faker->dateTimeBetween('-1 year'),
        ];
    }
}
