<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    /** @use HasFactory<\Database\Factories\SalesDetailFactory> */
    use HasFactory;

    protected $table = 'sales_details';
    protected $guarded = [];
    
}
