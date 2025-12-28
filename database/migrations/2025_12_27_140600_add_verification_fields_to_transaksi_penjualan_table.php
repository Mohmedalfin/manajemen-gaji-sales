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
        Schema::table('transaksi_penjualan', function (Blueprint $table) {
            $table->enum('status_verifikasi', ['peding', 'approved', 'rejected'])
                ->default('peding')
                ->after('produk_id');

            $table->string('bukti_transaksi')
                ->nullable()
                ->after('status_verifikasi');

            $table->foreignId('verified_by')
                ->nullable()
                ->after('bukti_transaksi')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_penjualan', function (Blueprint $table) {
            $table->dropForeign(['verified_by']);
            $table->dropColumn([
                'status_verifikasi',
                'bukti_transaksi',
                'verified_by',
            ]);
        });
    }
};
