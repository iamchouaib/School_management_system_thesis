<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ModuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'isPrimary' => $this->faker->boolean(),
            'priority' => $this->faker->numberBetween(1,6),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
