<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiPenjualan;
use App\Services\DashboardService;

class AdminController extends Controller
{
    public function index(Request $request, DashboardService $dashboard)
    {
        // 1. Query Data Transaksi
        $query = TransaksiPenjualan::with(['sales', 'barang']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('kode_transaksi', 'like', "%{$search}%")
                  ->orWhereHas('sales', fn ($subQ) =>
                      $subQ->where('nama_lengkap', 'like', "%{$search}%")
                  )
                  ->orWhereHas('barang', fn ($subQ) =>
                      $subQ->where('nama_produk', 'like', "%{$search}%")
                  )
                  ->orWhere('status_verifikasi', 'like', "%{$search}%");
            });
        }

        // 2. Eksekusi Pagination (Pertransaksi)
        $pertransaksi = $query->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        // 3. Ambil Data Summary (Statistik)
        $summary = $dashboard->summaryBulanan(now()->month, now()->year);

        // 4. Ambil Data Top Sales (Leaderboard)
        $topSales = TransaksiPenjualan::with('sales')
            ->select('sales_id')
            ->selectRaw('SUM(harga_total) as total_omset')
            ->selectRaw('SUM(jumlah_unit) as total_unit')
            ->selectRaw('SUM(komisi_penjualan) as total_komisi')
            ->selectRaw('COUNT(*) as jumlah_transaksi')
            ->where('status_verifikasi', 'approved')
            ->groupBy('sales_id')
            ->orderByDesc('total_omset')
            ->limit(5)
            ->get();

        // 5. Return View
        return view('admin.dashboard', [
            'pertransaksi' => $pertransaksi,
            'topSales'     => $topSales,
            ...$summary
        ]);
    }
}