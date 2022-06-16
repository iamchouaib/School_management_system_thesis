<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ColorSchemeComposer
{

    public function compose(View $view)
    {
        $view->with('color_scheme',
            session()->has('color_scheme') ? session('color_scheme') : "default"
        );
    }
}
