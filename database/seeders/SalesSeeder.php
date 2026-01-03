<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // DATA 1: Rocio Keebler (SLS-001)
        // ==========================================
        
        // 1. UPDATE atau INSERT ke tabel Sales
        // Logika: Cari 'kode_sales'. Jika ketemu, update datanya. Jika tidak, buat baru.
        DB::table('sales')->updateOrInsert(
            ['kode_sales' => 'SLS-001'], // KUNCI PENCARIAN (Agar tidak duplikat)
            [
                'nama_lengkap' => 'Rocio Keebler',
                'kontak' => '085795450669',
                'email' => 'rociokeebler@gmail.com', // Ini akan mengisi yang kosong
                'alamat' => 'Jl. Pemuda No. 45, Semarang Tengah', // Ini akan mengisi yang kosong
                'jabatan' => 'Junior',
                'gaji_pokok' => 3000000.00,
                'target_penjualan_bln' => 40000000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // 2. Ambil ID-nya (Karena kita butuh ID untuk tabel Users)
        $salesId1 = DB::table('sales')->where('kode_sales', 'SLS-001')->value('id');

        // 3. UPDATE atau INSERT ke tabel Users
        DB::table('users')->updateOrInsert(
            ['username' => 'sales_rocio'], // KUNCI PENCARIAN
            [
                'password_hash' => Hash::make('password'),
                'role' => 'sales',
                'sales_id' => $salesId1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ==========================================
        // DATA 2: Meagan Reilly (SLS-002)
        // ==========================================
        DB::table('sales')->updateOrInsert(
            ['kode_sales' => 'SLS-002'],
            [
                'nama_lengkap' => 'Meagan Reilly',
                'kontak' => '085504370761',
                'email' => 'meaganreilly@gmail.com',
                'alamat' => 'Jl. Pandanaran No. 10, Semarang Selatan',
                'jabatan' => 'Junior',
                'gaji_pokok' => 3000000.00,
                'target_penjualan_bln' => 40000000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $salesId2 = DB::table('sales')->where('kode_sales', 'SLS-002')->value('id');

        DB::table('users')->updateOrInsert(
            ['username' => 'sales_meagan'],
            [
                'password_hash' => Hash::make('password'),
                'role' => 'sales',
                'sales_id' => $salesId2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // ==========================================
        // DATA 3: Jennyfer Bayer (SLS-003)
        // ==========================================
        DB::table('sales')->updateOrInsert(
            ['kode_sales' => 'SLS-003'],
            [
                'nama_lengkap' => 'Jennyfer Bayer',
                'kontak' => '089435143614',
                'email' => 'jennyferbayer@gmail.com',
                'alamat' => 'Jl. Gajah Mada No. 88, Semarang',
                'jabatan' => 'Junior',
                'gaji_pokok' => 3000000.00,
                'target_penjualan_bln' => 129000000,
                'status_aktif' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $salesId3 = DB::table('sales')->where('kode_sales', 'SLS-003')->value('id');

        DB::table('users')->updateOrInsert(
            ['username' => 'sales_jennyfer'],
            [
                'password_hash' => Hash::make('password'),
                'role' => 'sales',
                'sales_id' => $salesId3,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}