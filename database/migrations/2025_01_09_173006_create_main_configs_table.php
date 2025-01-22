<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('main_configs', function (Blueprint $table) {
            $table->id();
            $table->char('judul');
            $table->longText('deskripsi');
            $table->longText('kata_kunci');
            $table->longText('meta_pixel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_configs');
    }
};
