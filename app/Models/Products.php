<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    protected $table = 'products';
    protected $guarded = [];


    public function rProductCategory (){
        return $this->belongsTo( Category::class, 'category_id');
    }

    public function rProductVarian (){
        return $this->hasMany( Varian::class, 'product_id');
    }
}
