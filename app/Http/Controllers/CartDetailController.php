<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store(Request $request ){
    	$car_detail = new CartDetail();

    	$car_detail->cart_id = auth()->user()->cart->id;
    	$car_detail->product_id = $request->product_id;
    	$car_detail->quantity = $request->quantity;
    	$car_detail->save();
        $notification = 'El producto se agregó al carrito de compras satisfactoriamente.';

    	return back()->with(compact('notification'));

    }

    public function destroy(Request $request){

    	$car_detail = CartDetail::find($request->car_detail_id);
    	//para evitar una vulnerabilidad de q un usuario pueda eliminar otro detalle
    	if($car_detail->cart_id == auth()->user()->cart->id)
    		$car_detail->delete();
    	$notification = "El producto se eliminó correctamente de su carrito de compras";

    	return back()->with(compact('notification'));

    }
}
