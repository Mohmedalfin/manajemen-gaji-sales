<?php

namespace App\Http\Controllers\Sales; // <--- Namespace harus Sales

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan Halaman Profil
    public function index()
    {
        // Memanggil file view: resources/views/sales/profil.blade.php
        return view('sales.profil', [
            'user' => auth()->user()
        ]); 
    }

    // Menampilkan Halaman Ganti Password
    public function password()
    {
        // Memanggil file view: resources/views/sales/password.blade.php
        return view('sales.password'); 
    }
}