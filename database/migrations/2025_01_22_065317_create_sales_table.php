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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('tanggal');
            $table->bigInteger('cs_id');
            $table->bigInteger('shift_id');
            $table->string('pukul');
            $table->bigInteger('pelanggan_id');
            $table->bigInteger('kanal_id');
            $table->bigInteger('akun_id');
            $table->bigInteger('sumber_id');
            $table->bigInteger('strategi_id');
            $table->bigInteger('bank_id');
            $table->string('bukti_transfer');
            $table->double('total');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
