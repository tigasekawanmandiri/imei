<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainConfig extends Model
{
    /** @use HasFactory<\Database\Factories\MainConfigFactory> */
    use HasFactory;

    protected $table = 'main_configs';
    protected $guarded = [];
}
