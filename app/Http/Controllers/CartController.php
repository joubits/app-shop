<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); //update


    	$notification = 'Su carrito de compras se ha registrado satisfactoriamente. Lo contactaremos pronto por via mail!!';
    	return back()->with(compact('notification'));
    }
}
