<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunPenjualan extends Model
{
    /** @use HasFactory<\Database\Factories\AkunPenjualanFactory> */
    use HasFactory;

    protected $table = 'akun_penjualans';
    protected $guarded = [];
}
