<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;


class BarangSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::factory(10)->create();
    }
}
