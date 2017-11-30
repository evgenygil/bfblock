<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Functions;

class Controller extends BaseController
{
    public function index()
    {
        return view('home');
    }

    private function che() {
//        Functions::decrypt()
    }
}
