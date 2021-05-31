<?php

namespace App\Http\View\Composers;

use App\Models\profile;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('profile', profile::all()->first());
    }
}