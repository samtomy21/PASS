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
            //'charge_id' => Charge::factory(),
            //'dependence_id' => Dependence::factory(),
            'user_id' => User::factory(),

            'ncard' => $this->faker->randomDigitNot(6),
            'name' => $this->faker->name(),
            'motive' => $this->faker->sentence(),
            'place' => $this->faker->secondaryAddress(),
            'observation' => $this->faker->sentence(25),
            'time' => $this->faker->time(),
            'input' => $this->faker->time(),
            'output' => $this->faker->time(),
            'date' => $this->faker->date(),

        ];
    }
}
