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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id'); // Primary Key
            $table->unsignedBigInteger('penjualan_id'); // Foreign Key to t_penjualan
            $table->unsignedBigInteger('barang_id'); // Foreign Key to m_barang
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps(); // created_at and updated_at
        
            // Foreign Key Constraints
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan')->onDelete('cascade');
            $table->foreign('barang_id')->references('barang_id')->on('m_barang')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
