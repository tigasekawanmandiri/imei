<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategiSelling extends Model
{
    /** @use HasFactory<\Database\Factories\StrategiSellingFactory> */
    use HasFactory;
    protected $table = 'strategi_sellings';
    protected $guarded = [];
}
