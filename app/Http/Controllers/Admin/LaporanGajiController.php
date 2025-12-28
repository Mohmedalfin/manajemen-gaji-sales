<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiPenjualan;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use App\Services\LaporanGajiService;

class LaporanGajiController extends Controller
{
    public function index(Request $request, LaporanGajiService $gajiService)
    {
        $bulan = $request->input('bulan', now()->month);
        $tahun = $request->input('tahun', now()->year);

        $gajiData = $gajiService->getLaporanGaji($bulan, $tahun);
        $poinLaporan = $gajiService->getPoinLaporan($bulan, $tahun);


        return view('admin.laporan-gaji', [
            'gajiData' => $gajiData,
            'bulan'    => $bulan, 
            'tahun'    => $tahun,
            ...$poinLaporan
        ]);
    }
}
