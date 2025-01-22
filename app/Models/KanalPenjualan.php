<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KanalPenjualan extends Model
{
    /** @use HasFactory<\Database\Factories\KanalPenjualanFactory> */
    use HasFactory;

    protected $table = 'kanal_penjualans';
    protected $guarded = [];
}
