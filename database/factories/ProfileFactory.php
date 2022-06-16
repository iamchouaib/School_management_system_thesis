<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProfileFactory extends Factory
{

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'image' => $this->faker->word(),
            'birthday' => $this->faker->date(),
            'city' => $this->faker->city(),
            'address' => $this->faker->address(),
            'postcode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'bank_name' => $this->faker->word(),
            'bank_account' => $this->faker->creditCardNumber(),
            'id_type' => 'ic' ,
            'id_number' => $this->faker->iban('213'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
        ];
    }


}
