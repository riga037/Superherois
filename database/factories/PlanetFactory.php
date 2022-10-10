<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

//afegit
use App\Models\Planet;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planet>
 */
class PlanetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => Str::random(10), // $this->faker->name,
        ];
    }
}
