<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    //

    protected $table = 'varians';
    protected $guarded = [];

    public function sproductname(){
        return $this->belongsTo(Products::class,'product_id', 'id');
    }

    public function sdurationname() {
        return $this->belongsTo(Duration::class, 'duration_id', 'id');
    }
}
