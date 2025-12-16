<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanGaji extends Model
{
    use HasFactory;

    protected $table = 'laporan_gaji';
    protected $primaryKey = 'laporan_gaji_id';

    protected $fillable = [
        'sales_id',
        'periode_bulan',
        'gaji_pokok_total',
        'komisi_total',
        'total_gaji_dibayarkan',
    ];

    protected $casts = [
        'gaji_pokok_total' => 'decimal:2',
        'komisi_total' => 'decimal:2',
        'total_gaji_dibayarkan' => 'decimal:2',
    ];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id', 'sales_id');
    }
}
