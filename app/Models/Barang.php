<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'harga_jual_unit',
        'stok',
    ];

    protected $casts = [
        'harga_jual_unit' => 'decimal:2',
        'stok' => 'integer',
    ];

    protected static function booted()
    {
        static::created(function ($produk) {
            $produk->kode_produk = 'PRD-' . str_pad($produk->id, 3, '0', STR_PAD_LEFT);
            $produk->save();
        });
    }

    public function transaksi()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'produk_id', 'produk_id');
    }
}
