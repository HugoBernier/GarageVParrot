<?php

namespace Database\Factories;

use App\Models\FormulaireContact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormulaireContact>
 */
class FormulaireContactFactory extends Factory
{
    protected $model = FormulaireContact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'adresse_email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->paragraph(),
        ];
    }
}
