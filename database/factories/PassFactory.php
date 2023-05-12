<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Charge;
use App\Models\Dependence;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pass>
 */
class PassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'charge_id' => rand(1,4),
            'dependence_id' => rand(1,27),
            'user_id' => rand(1,4),

            'motive' => $this->faker->sentence(),
            'place' => $this->faker->secondaryAddress(),
            'observation' => $this->faker->word(),
            'estado' => $this->faker->numberBetween($min = 0, $max = 4),
            'time' => $this->faker->time(),
            'input' => $this->faker->time(),
            'output' => $this->faker->time(),
            'date' => $this->faker->date(),

        ];
    }
}
