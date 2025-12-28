<?php

namespace App\Services;

use App\Models\Sales;
use App\Models\TransaksiPenjualan;
use Carbon\Carbon;

class DashboardService
{
    public function summaryBulanan(int $bulan, int $tahun): array
    {
        $queryBulanIni = TransaksiPenjualan::whereMonth('tanggal_transaksi', $bulan)
            ->whereYear('tanggal_transaksi', $tahun);

        return [
            'totalSales' => Sales::count(),
            'totalUnitBulanIni' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->sum('jumlah_unit'),
            'totalPenjualan' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->sum('harga_total'),
            'totalTransaksi' => (clone $queryBulanIni)
                ->where('status_verifikasi', 'approved') 
                ->count()        
            
        ];
    }
}
