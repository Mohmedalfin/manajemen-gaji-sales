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
        Sales::factory(1)->create(); 

        Sales::factory(2)->junior()->create();
    }
}
