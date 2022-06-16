<?php

namespace App\Http\View\Composers;

use App\Faker;
use App\Models\Announce;
use App\Models\Guardian;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoggedInUserComposer
{
    public function compose(View $view)
    {
        //bind data here
    }
}
