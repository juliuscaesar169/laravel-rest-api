<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commune;

class CommuneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_com' => 1,//check...shouldnt be necessary
            'id_reg' => 1,
            'description' => 'comuna std',
        ];
    }
}
