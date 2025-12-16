<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/login', function () {
    return view('auth.login'); 
})->name('login');

Route::post('/login', function (Request $request) {
    
    // --- Data Dummy ---
    $email = strtolower($request->input('email'));
    $password = $request->input('password');

    $dummyUsers = [
        'admin@gmail.com' => [
            'password' => 'admin123', 
            'role' => 'admin',
        ],
        'sales@gmail.com' => [
            'password' => 'sales123', 
            'role' => 'sales',
        ],
    ];

    if (isset($dummyUsers[$email]) && $password === $dummyUsers[$email]['password']) {
        
        $role = $dummyUsers[$email]['role'];
        
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'sales') {
            return redirect()->route('sales.dashboard');
        }
    }

    return redirect()->back()->withErrors(['email' => 'Kredensial tidak sesuai dengan akun dummy.']);

})->name('login.attempt');

// ROUTE DASHBOARD ADMIN (SEMENTARA TANPA PROTEKSI)
Route::prefix('admin')->group(function () {
    
    // 1. Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    // 2. Data Sales
    Route::get('/data-sales', function () {
        return view('admin.data-sales');
    })->name('admin.data_sales');
    
    // 3. Data Barang
    Route::get('/data-barang', function () {
        return view('admin.data-barang'); 
    })->name('admin.data_barang');

    // 4. Laporan Gaji
    Route::get('/laporan-gaji', function () {
        return view('admin.laporan-gaji'); 
    })->name('admin.laporan_gaji');

    // 5. Edit Profil
    Route::get('/profil', function () {
        return view('admin.profil'); 
    })->name('admin.profil');
});

// ROUTE DASHBOARD SALES
Route::prefix('sales')->group(function () {
    
    // Dashboard Sales
    Route::get('/dashboard', function () {
        // Nanti taruh di view: resources/views/sales/dashboard.blade.php
        return view('sales.dashboard'); 
    })->name('sales.dashboard');
});


// Route Logout
Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');