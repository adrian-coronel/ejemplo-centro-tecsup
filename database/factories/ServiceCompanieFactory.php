<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCompanie>
 */
class ServiceCompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        # pluck('<column>') obtiene un array de los valores de una columna específica
        $serviceIds =  Service::pluck('id')->toArray();

        return [
            'name' => fake()->name(),
            'id_service' => fake()->randomElement($serviceIds),
            'contact_number' => fake()->phoneNumber(),
            'email' => fake()->unique()->email(),
            'description' => fake()->text(60)
        ];
    }
}
