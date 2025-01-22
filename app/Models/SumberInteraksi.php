<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberInteraksi extends Model
{
    /** @use HasFactory<\Database\Factories\SumberInteraksiFactory> */
    use HasFactory;

    protected $table = 'sumber_interaksis';
    protected $guarded = [];
}
