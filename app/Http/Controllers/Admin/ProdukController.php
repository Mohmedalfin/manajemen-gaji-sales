<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.data-barang');  // Pastikan view ada di resources/views/admin/produk.blade.php
    }
}
