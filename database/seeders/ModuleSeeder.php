<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\User;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        Module::factory()
            ->hasAttached(User::find(rand(11, 20)))
            ->create();

    }
}
