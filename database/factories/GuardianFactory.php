<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class GuardianFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('chouaibe'),
            'photo' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'birthday' => $this->faker->date(),
            'job' => $this->faker->jobTitle(),
            'isActive' => rand(1,2),
            'bank_name' => $this->faker->company(),
            'bank_account' => $this->faker->creditCardNumber(),
            'id_type' => 'ic' ,
            'id_number' => $this->faker->iban('213'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
