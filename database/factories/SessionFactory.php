<?php

namespace Database\Factories;

use App\Models\Semester;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SessionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'groupe_id' => rand(395 , 396),
            'module_id' => rand(1,30),
            'day' => $this->faker->dayOfWeek(),
            'duration' => now(),
            'session_type' => 'td',
            'sale_id' => $this->faker->randomNumber(),
            'semester_id' => 1,
            'user_id' => rand(1,10),
        ];
    }
}
