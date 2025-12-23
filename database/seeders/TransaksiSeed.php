<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransaksiPenjualan; // Pastikan Model di-import

class TransaksiSeed extends Seeder
{
    public function run(): void
    {
        // HAPUS $this->call(...) DARI SINI.
        // File ini tugasnya hanya satu: Jalankan Factory Transaksi.
        
        // Perbaikan: Ganti 'Transaksi' jadi 'TransaksiPenjualan' (sesuai use diatas)
        TransaksiPenjualan::factory(50)->create(); 
    }
}