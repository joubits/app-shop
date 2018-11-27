<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class TestController extends Controller
{
    public function home()
    {
        
    	//has() se usa para cuando se quiere obtener categorias q tienen al menos un producto...
        $categories = Category::has('products')->get();
        return view('welcome')->with(compact('categories'));
        //return 'Desde el controlador TestController con el metodo home!!';
    }
}
