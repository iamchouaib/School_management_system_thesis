<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AnnounceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'content' => $this->faker->paragraph(),
            'published' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => User::factory(),
        ];
    }
}
