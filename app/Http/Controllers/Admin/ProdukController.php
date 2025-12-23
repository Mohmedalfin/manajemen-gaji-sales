<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Barang::orderByDesc('id')->paginate(20);
        return view('admin.data-barang', compact('produk'));  
    }
}
