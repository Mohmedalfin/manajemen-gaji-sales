<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan SalesSeed terlebih dahulu
        // Karena di Model Sales sudah ada static::created -> User::create,
        // Maka 60 User Sales otomatis sudah terbuat saat baris ini dijalankan.
        $this->call(SalesSeed::class); 

        // 2. Membuat satu Admin dengan password: password
        User::factory()->admin()->create([
            'username' => 'admin',
            'password_hash' => Hash::make('password'), // Set password manual
            'sales_id' => null, // Admin tidak punya sales_id
        ]);

        // Catatan: 
        // Anda TIDAK PERLU lagi melakukan foreach ($salesCollection as $sales) 
        // karena User untuk Sales sudah dibuat otomatis oleh Model Event 'created' di Sales.php
    }
}