<?php

namespace App\Services;

use App\Models\Sales;
use App\Models\LaporanGaji;
use App\Models\TransaksiPenjualan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanGajiService
{
    public function getLaporanGaji(int $bulan, int $tahun)
    {
        return Sales::query()
            // 1. LEFT JOIN: Agar sales yang performanya 0 tetap muncul
            ->leftJoin('transaksi_penjualan', function($join) use ($bulan, $tahun) {
                $join->on('sales.id', '=', 'transaksi_penjualan.sales_id')
                     ->where('transaksi_penjualan.status_verifikasi', 'approved')
                     ->whereMonth('transaksi_penjualan.tanggal_transaksi', $bulan)
                     ->whereYear('transaksi_penjualan.tanggal_transaksi', $tahun);
            })
            // 2. SELECT & AGREGASI
            ->select(
                'sales.id',
                'sales.nama_lengkap',
                'sales.gaji_pokok',
                // Hitung Agregat (COALESCE mengubah null jadi 0)
                DB::raw('COUNT(transaksi_penjualan.id) as total_transaksi'),
                DB::raw('COALESCE(SUM(transaksi_penjualan.jumlah_unit), 0) as total_unit'),
                DB::raw('COALESCE(SUM(transaksi_penjualan.harga_total), 0) as total_omset'),
                DB::raw('COALESCE(SUM(transaksi_penjualan.komisi_penjualan), 0) as total_komisi')
            )
            // 3. GROUP BY (Wajib saat menggunakan Agregasi)
            ->groupBy('sales.id', 'sales.nama_lengkap', 'sales.gaji_pokok')
            ->get();
    }

    public function getPoinLaporan(int $bulan, int $tahun): array
    {
        $transaksiStats = TransaksiPenjualan::whereMonth('tanggal_transaksi', $bulan)
            ->whereYear('tanggal_transaksi', $tahun)
            ->where('status_verifikasi', 'approved')
            ->selectRaw('SUM(komisi_penjualan) as total_komisi')
            ->selectRaw('SUM(harga_total) as total_omset')
            ->first();

        $totalKomisi = $transaksiStats->total_komisi ?? 0;
        $totalOmset  = $transaksiStats->total_omset ?? 0;

        $totalGajiPokok = Sales::where('status_aktif', 1)->sum('gaji_pokok'); 

        $totalPengeluaranGaji = $totalGajiPokok + $totalKomisi;

        return [            
            'totalKomisi'  => (int) $totalKomisi,

            'totalGaji'    => (int) $totalPengeluaranGaji, 

            'totalRevenue' => (int) ($totalOmset - $totalPengeluaranGaji), 
        ];
    }

    
}
