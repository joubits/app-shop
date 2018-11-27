<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));
    	//echo "Admin products";

    }

    public function create()
    {
        //get categories
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));
    	
    }

    public function store(Request $request)
    {
    	$messages = [
    		'name.required' => 'El nombre es un campo obligatorio.',
    		'name.min' => 'El nombre debe tener al menos 3 caracteres.',
    		'description.required' => 'La descripcion es un campo obligatorio.',
    		'description.max' => 'La descripcion tiene maximo 200 caracteres.',
    		'price.required' => 'El precio es un campo obligatorio.',
    		'price.numeric' => 'El precio es un caracter numerico.',
    		'price.min' => 'El precio debe ser numero positivo.'

    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	//validar datos
    	$this->validate($request, $rules, $messages);
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

    	$product->save();
    	return redirect('/admin/products');
    	
    }

    public function edit($id)
    {
    	$product = Product::find($id);
        //get categories
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.edit')->with(compact('product','categories'));
    	
    }

    public function update(Request $request, $id)
    {
    	//validar datos
    	$messages = [
    		'name.required' => 'El nombre es un campo obligatorio.',
    		'name.min' => 'El nombre debe tener al menos 3 caracteres.',
    		'description.required' => 'La descripcion es requerida.',
    		'description.max' => 'La descripcion tiene maximo 200 caracteres.',
    		'price.required' => 'El precio es obligatorio.',
    		'price.numeric' => 'El precio es un caracter numerico.',
    		'price.min' => 'El precio debe ser numero positivo.'

    	];

    	$rules = [
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];

    	$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->long_description = $request->input('long_description');
    	$product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

    	$product->save();
    	return redirect('/admin/products');
    	
    }

    public function destroy($id)
    {
    	$product = Product::find($id);
    	ProductImage::where('product_id', $id)->delete();
    	$product->delete();//DELETE
    	return back();
    	
    }
}
