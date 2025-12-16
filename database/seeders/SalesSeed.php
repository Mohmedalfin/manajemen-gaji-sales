<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sales;


class SalesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Membuat 50 Sales acak (menggunakan logika di definition())
        Sales::factory(50)->create(); 

        // 3. Membuat 10 Sales Junior
        Sales::factory(10)->junior()->create();
    }
}
