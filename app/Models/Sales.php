<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends Model
{
    use HasFactory;

    protected $primaryKey = 'sales_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_lengkap',
        'kontak',
        'jabatan',
        'gaji_pokok',
        'target_penjualan_bln',
        'status_aktif',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'target_penjualan_bln' => 'decimal:2',
        'status_aktif' => 'boolean',
    ];

    protected static function booted()
    {
        // 1. EVENT 'CREATING'
        // Dijalankan SEBELUM data disimpan ke database.
        // Tugas: Membuat Kode Sales Otomatis (SLS-001, SLS-002, dst)
        static::creating(function ($sales) {
            
            // Cek kode sales terakhir untuk menentukan nomor urut
            $lastSales = Sales::orderBy('sales_id', 'desc')->first();
            
            if (!$lastSales) {
                $number = 1;
            } else {
                // Ambil angka dari kode terakhir (misal SLS-015 -> ambil 15)
                // Kita ambil 3 digit terakhir lalu tambah 1
                $number = intval(substr($lastSales->kode_sales, -3)) + 1;
            }

            // Format ulang jadi 3 digit (001, 002, 010, dst)
            $sales->kode_sales = 'SLS-' . str_pad($number, 3, '0', STR_PAD_LEFT);
        });

        static::created(function ($sales) {
            
            User::create([
                'username'      => $sales->kode_sales, 
                
                'password_hash' => Hash::make('sales'), 
                
                'role'          => 'sales',
                
                'sales_id'      => $sales->sales_id, 
            ]);
            
        });
    }

    public function user()
    {
        return $this->hasOne(User::class, 'sales_id', 'sales_id');
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'sales_id', 'sales_id');
    }

    public function laporanGaji()
    {
        return $this->hasMany(LaporanGaji::class, 'sales_id', 'sales_id');
    }
}
