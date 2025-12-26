<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BarangRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Barang::orderByDesc('id')->paginate(20);
        return view('admin.data-barang', compact('produk'));  
    }

    public function store(BarangRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Barang::create($data);
        return redirect()->back()->with('success', 'Data barang berhasil ditambahkan');    
    }
}
