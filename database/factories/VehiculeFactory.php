<?php

namespace Database\Factories;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicule>
 */
class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'admin_id' => 1,
            'prix' => $this->faker->numberBetween($min = 500, $max = 20000),
            'marque' => 'Dacia',
            'modele' => $this->faker->word(1),
            'image' => '/resources/images/Dacia.jpg',
            'annee' => $this->faker->year($max = 'now'),
            'kilometrage' => $this->faker->randomNumber(5),
            'caracteristiques' => $this->faker->paragraph(),
        ];
    }
}
