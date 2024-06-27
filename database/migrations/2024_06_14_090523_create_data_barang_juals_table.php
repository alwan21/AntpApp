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
        Schema::create('data_barang_juals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('kode_satuan');
            $table->integer('harga_beli');
            $table->boolean('active');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_barang_juals');
    }
};
