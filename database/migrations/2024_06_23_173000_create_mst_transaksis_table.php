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
        Schema::create('mst_transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('invoice_code');
            $table->string('keterangan');
            $table->integer('total');
            $table->boolean('broadcast');
            $table->boolean('status');
            $table->boolean('batal');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_transaksis');
    }
};
