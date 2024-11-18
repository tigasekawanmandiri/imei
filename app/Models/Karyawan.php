<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    /** @use HasFactory<\Database\Factories\KaryawanFactory> */
    use HasFactory;

    protected $table = 'karyawans';
    protected $guarded = [];

    public function rJabatanKaryawan() {
        return $this->belongsTo( Jabatan::class, 'jabatan_id' );
    }

    public function rPosisiKaryawan() {
        return $this->belongsTo( Posisi::class, 'posisi_id' );
    }
}
