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
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();

            $table->string('kode_transaksi', 20)->uniqid();
            $table->date('tanggal_transaksi');

            $table->foreignId('sales_id')
                ->constrained('sales')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            
            $table->foreignId('produk_id')
                ->constrained('produk')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->integer('jumlah_unit')->default(0);
            $table->decimal('harga_total', 10, 2)->default(0);

            $table->timestamps();

            // $table->index(['tanggal_transaksi', 'sales_id']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};
