<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class DarkModeComposer
{
    public function compose(View $view)
    {
        $view->with('dark_mode',
            session()->has('dark_mode') ? filter_var(session('dark_mode'), FILTER_VALIDATE_BOOLEAN) : false
        );
    }
}
