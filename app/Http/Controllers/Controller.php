<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function pageNotFound()
    {
        return view('error.pageerror');
    }
}
