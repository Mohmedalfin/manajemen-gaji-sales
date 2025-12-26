<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Barang;
use App\Models\TransaksiPenjualan;
use App\Models\LaporanGajiController;

class AdminController extends Controller
{
    public function index()
    {
        $bulanIni = now()->month;
        $tahunIni = now()->year;

        $totalSales = Sales::count();
        $totalUnitBulanIni = TransaksiPenjualan::whereMonth('tanggal_transaksi', $bulanIni)
            ->whereYear('tanggal_transaksi', $tahunIni)
            ->sum('jumlah_unit'); 

        $totalPenjualan = TransaksiPenjualan::whereMonth('tanggal_transaksi', $bulanIni)
            ->whereYear('tanggal_transaksi', $tahunIni)
            ->sum('harga_total');  

        return view('admin.dashboard', compact('totalSales', 'totalUnitBulanIni', 'totalPenjualan'));  
    }
}
