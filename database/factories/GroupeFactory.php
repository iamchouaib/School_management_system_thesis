<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class GroupeFactory extends Factory
{
    public function definition(): array
    {
        return [

            'section_id' => rand(1,12),
            'name' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),


        ];
    }
}
