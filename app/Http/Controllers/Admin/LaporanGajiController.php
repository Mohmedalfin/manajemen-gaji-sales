<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanGajiController extends Controller
{
    public function index()
    {
        return view('admin.laporan-gaji');  // Pastikan view ada di resources/views/admin/laporan-gaji.blade.php
    }
}
