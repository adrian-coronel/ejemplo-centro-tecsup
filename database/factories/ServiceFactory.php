<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $occupations = ['Salud', 'Seguridad', 'TI','Medio Ambiente','Transporte'];

        return [
            'name' => fake()->randomElement($occupations),
            'location' => fake()->address(),
            'description'=> fake()->text(200)
        ];
    }
}
