<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; //clase para manipular fechas

use App\Mail\NewOrder;
use App\User;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save(); //update

    	//send mail
    	$admins = User::where('admin',true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));


    	$notification = 'Su carrito de compras se ha registrado satisfactoriamente. Lo contactaremos pronto por via mail!!';
    	return back()->with(compact('notification'));
    }
}
