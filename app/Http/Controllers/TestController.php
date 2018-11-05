<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home()
    {
        return view('welcome');
        //return 'Desde el controlador TestController con el metodo home!!';
    }
}
