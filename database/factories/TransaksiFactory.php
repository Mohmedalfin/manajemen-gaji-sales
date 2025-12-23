<?php

namespace Database\Factories;

use App\Models\TransaksiPenjualan;
use App\Models\Sales;   
use App\Models\Barang; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransaksiFactory extends Factory
{
    protected $model = TransaksiPenjualan::class;

    public function definition(): array
    {
        // ---------------------------------------------------------
        // 1. AMBIL SALES YANG SUDAH ADA (Existing)
        // ---------------------------------------------------------
        // Ambil 1 sales secara acak dari database
        $sales = Sales::inRandomOrder()->first();

        // Jaga-jaga: Jika tabel sales kosong, baru kita paksa buat 1
        if (!$sales) {
            $sales = Sales::factory()->create();
        }

        // ---------------------------------------------------------
        // 2. AMBIL PRODUK YANG SUDAH ADA (Existing)
        // ---------------------------------------------------------
        $barang = Barang::inRandomOrder()->first();

        // Jaga-jaga: Jika tabel produk kosong
        if (!$barang) {
            $barang = Barang::factory()->create();
        }

        // ---------------------------------------------------------
        // 3. LOGIKA HITUNG HARGA
        // ---------------------------------------------------------
        // Tentukan jumlah beli (misal 1 - 5 unit)
        $jumlahUnit = $this->faker->numberBetween(1, 5);

        // Ambil harga dari produk yg terpilih (Pastikan nama kolomnya sesuai DB Anda)
        // Misal di DB nama kolomnya: harga_jual_unit
        $hargaSatuan = $barang->harga_jual_unit; 

        // Kalikan
        $hargaTotal = $hargaSatuan * $jumlahUnit;

        return [
            'kode_transaksi'    => 'TRX-' . strtoupper(Str::random(8)),
            'tanggal_transaksi' => $this->faker->dateTimeThisMonth(), // Transaksi bulan ini
            
            // KUNCI JAWABAN ANDA DISINI:
            'sales_id'          => $sales->id,   // Pakai ID dari sales yg diambil di atas
            'produk_id'         => $barang->id,  // Pakai ID dari produk yg diambil di atas
            
            'jumlah_unit'       => $jumlahUnit,
            'harga_total'       => $hargaTotal,
        ];
    }
}