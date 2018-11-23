<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured','desc')->get();
    	return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request, $id)
    {
    	# guardar img en nuestro proyecto
    	$file = $request->file('photo');
    	$path = public_path().'/images/products';
    	//dd("Path:".$path);

    	$filename = uniqid() . $file->getClientOriginalName();
    	$moved = $file->move($path,$filename);


    	# crear 1 registro en la tabla product_images
    	if($moved){
	    	$product_image = new ProductImage();
	    	$product_image->image = $filename;
	    	//$product_image->feature = false; no necessary, its value by default is false
	    	$product_image->product_id = $id;
	    	$product_image->save();
    	}

    	return back();
    }

    public function destroy(Request $request, $id)
    {
    	//remove file
    	$product_image = ProductImage::find($request->image_id);
    	if(substr($product_image->image, 0,4) !== 'http'){
    		$fullpath = public_path().'/images/products/' . $product_image->image;
    		//dd($fullpath);
    		$deleted = File::delete($fullpath);
    	}else{
    		$deleted = true;
    	}

    	//remove row bd if file was removed
    	if($deleted){
    		$product_image->delete();
    	}

    	return back();
    }

    public function select($id, $image){
        ProductImage::where('product_id', $id)->update([
            'featured' => false
        ]);


        $product_image = ProductImage::find($image);
        $product_image->featured = true;
        $product_image->save();

        return back();

    }
}
