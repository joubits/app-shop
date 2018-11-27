<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //$product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    //$product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute(){
        $featured_image = $this->images()->where('featured', true)->first();
        if(!$featured_image){
            $featured_image = $this->images()->first();
            //return  $product_images_folder . $featured_image->image;
        }

        if($featured_image){
            //echo $featured_image;
            return $featured_image->url;
        }

        return '/images/products/default.png';
    }

    public function getCategoryNameAttribute()
    {
        if($this->category)
            return $this->category->name;

        return 'General';
    }

}
