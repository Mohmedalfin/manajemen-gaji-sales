<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_gaji', function (Blueprint $table) {
            $table->id('laporan_gaji_id'); 

            $table->unsignedBigInteger('sales_id');

            $table->string('periode_bulan', 7);

            $table->decimal('gaji_pokok_total', 10, 2)->default(0);
            $table->decimal('komisi_total', 10, 2)->default(0);
            $table->decimal('total_gaji_dibayarkan', 10, 2)->default(0);

            $table->timestamps();

            // FK + index
            $table->foreign('sales_id')
                  ->references('sales_id')
                  ->on('sales')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->index(['sales_id', 'periode_bulan']);

            // 1 sales hanya boleh 1 laporan per periode
            $table->unique(['sales_id', 'periode_bulan'], 'uq_laporan_gaji_sales_periode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_gaji');
    }
};
