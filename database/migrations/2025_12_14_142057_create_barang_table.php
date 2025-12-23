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
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); // bigint unsigned, auto increment (PK)

            $table->string('kode_produk', 20)->unique();
            $table->string('nama_produk', 150);

            $table->decimal('harga_jual_unit', 15, 2)->default(0);
            $table->integer('stok')->default(0);

            $table->timestamps();

            $table->index('nama_produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
