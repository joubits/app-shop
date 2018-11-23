<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function home()
    {
        $products = Product::paginate(9);
        return view('welcome')->with(compact('products'));
        //return 'Desde el controlador TestController con el metodo home!!';
    }
}
