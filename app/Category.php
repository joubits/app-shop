<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $messages = [
		'name.required' => 'El nombre es un campo obligatorio.',
		'name.min' => 'El nombre debe tener al menos 3 caracteres.',
		'description.required' => 'La descripcion es requerida.'

	];

	public static $rules = [
		'name' => 'required|min:3',
		'description' => 'required|max:200'
	];

    protected $fillable = ['name','description'];
    //$category->products
    public function products()
    {
    	return $this->hasMany(Product::class);

    }

    public function getFeaturedImageUrlAttribute()
    {
        if($this->image)
            return '/images/categories/'.$this->image;
    	

        $first_product = $this->products->first();
        if($first_product)
            return $first_product->featured_image_url;

        return '/images/default.png';
    	
    }
}
