<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'produk_id',
        'nama_produk',
        'harga_jual_unit',
        'stok',
    ];

    protected $casts = [
        'harga_jual_unit' => 'decimal:2',
        'stok' => 'integer',
    ];

    public function transaksi()
    {
        return $this->hasMany(TransaksiPenjualan::class, 'produk_id', 'produk_id');
    }
}
