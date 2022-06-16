<?php

namespace Database\Factories;

use App\Models\Groupe;
use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'guardian_id' => rand(201, 400),
            'email' => $this->faker->safeEmail,
            'birthday' => $this->faker->date,
            'groupe_id' => rand(1, 25),  //groupe before
            'image' => '/profile-' . rand(1, 9) . '.jpg',
        ];
    }
}
