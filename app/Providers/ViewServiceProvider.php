<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        View::composer('*', 'App\Http\View\Composers\MenuComposer');
        View::composer('*', 'App\Http\View\Composers\FakerComposer');
        View::composer('*', 'App\Http\View\Composers\DarkModeComposer');
        View::composer('*', 'App\Http\View\Composers\LoggedInUserComposer');
        View::composer('*', 'App\Http\View\Composers\ColorSchemeComposer');
    }
}
