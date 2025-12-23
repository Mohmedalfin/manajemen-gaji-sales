<?php

namespace Database\Factories;

use App\Models\Barang; 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Barang::class;
    protected static $urutan = 1;

    public function definition(): array
    {
        $currentNumber = self::$urutan++;
        $kodeBarang = 'PRD-' . str_pad($currentNumber, 3, '0', STR_PAD_LEFT);

        return [
            'kode_produk' => $kodeBarang,
            'nama_produk' => $this->faker->name(),
            'harga_jual_unit' => $this->faker->numberBetween(5000, 500000),
            'stok' => $this->faker->numberBetween(0, 100),  
            'created_at' => now(),
            'updated_at' => now(),        
        ];
    }
}
