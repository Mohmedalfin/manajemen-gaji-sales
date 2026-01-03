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
        Schema::table('sales', function (Blueprint $table) {
            // Menambahkan kolom email & alamat setelah kolom kontak
            // nullable() artinya boleh kosong (opsional, jaga-jaga kalau ada data lama)
            $table->string('email', 100)->nullable()->after('kontak'); 
            $table->text('alamat')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales', function (Blueprint $table) {
            // Perintah untuk menghapus kolom jika di-rollback
            $table->dropColumn(['email', 'alamat']);
        });
    }
};