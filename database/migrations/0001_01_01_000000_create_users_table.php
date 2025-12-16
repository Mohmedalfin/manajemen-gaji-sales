<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Sales; // Import Model Sales
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; // Gunakan Hash untuk password

class UserFactory extends Factory
{
    /**
     * Nama Model yang sesuai dengan Factory ini.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Definisikan state default Model (Default kita jadikan Sales).
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Pastikan Anda telah mengganti 'password_hash' menjadi 'password' di migration
            // jika menggunakan Auth Laravel standar. Saya asumsikan Anda menggunakan 'password_hash'.
            'password_hash' => Hash::make('password'), // Password default: 'password'
            'username' => $this->faker->unique()->userName(),
            
            // Default diatur sebagai Sales, ID Sales akan diatur di state sales() di bawah
            'role' => 'sales', 
            'sales_id' => null, // Dibuat NULL dulu, diisi saat state sales() dipanggil.
            
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
    // --- STATE SPESIFIK ---

    /**
     * State untuk User dengan role Admin.
     * Admin tidak memiliki sales_id.
     */
    public function admin(): Factory
    {
        return $this->state(fn (array $attributes) => [
            'username' => 'admin_' . $this->faker->unique()->randomNumber(4),
            'role' => 'admin',
            'sales_id' => null, // Penting: harus NULL
        ]);
    }
    
    /**
     * State untuk User dengan role Sales.
     * Sales HARUS memiliki relasi 1:1 ke tabel sales.
     * Ini adalah logika yang harus Anda gunakan di Seeder.
     *
     * @param Sales|null $sales
     */
    public function forSales(Sales $sales = null): Factory
    {
        return $this->state(fn (array $attributes) => [
            'username' => 'sales_' . $this->faker->unique()->randomNumber(4),
            'role' => 'sales',
            // Jika objek Sales diberikan, ambil PK-nya, jika tidak, buat Sales baru
            'sales_id' => $sales ? $sales->sales_id : Sales::factory()->create()->sales_id,
        ]);
    }
}