<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //has many cartDetails
    public function details(){
    	return $this->hasMany(CartDetail::class);
    }
}
