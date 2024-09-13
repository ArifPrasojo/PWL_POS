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
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id'); // Primary Key
            $table->unsignedBigInteger('user_id'); // Foreign Key
            $table->string('pembeli', 50);
            $table->string('penjualan_kode', 20);
            $table->datetime('penjualan_tanggal');
            $table->timestamps(); // created_at and updated_at
        
            // Foreign Key Constraints
            $table->foreign('user_id')->references('user_id')->on('m_user')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
