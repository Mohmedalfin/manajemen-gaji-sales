@extends('layouts.sales')

@section('content')

{{-- 1. HEADER WELCOME --}}
<div class="relative bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl p-4 md:p-6 mb-6 md:mb-8 text-white shadow-lg overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-sm font-medium opacity-90 mb-1">Selamat Datang</h2>
        <h1 class="text-2xl md:text-3xl font-bold mb-2">
            {{ auth()->user()->sales ? auth()->user()->sales->nama_lengkap : auth()->user()->username }}</h1>    
        <p class="text-sm md:text-base opacity-90 pr-10">Tetap semangat mencapai target penjualan bulan ini!</p>
    </div>
    <div class="absolute right-0 top-0 h-full w-1/3 bg-white opacity-10 transform skew-x-12 translate-x-10"></div>
</div>

{{-- 2. STATS CARDS --}}
<h3 class="font-bold text-gray-700 mb-4 text-lg">Performa Hari Ini</h3>
<div class="grid grid-cols-2 xl:grid-cols-4 gap-3 md:gap-4 mb-8">
    
    {{-- Card 1: Transaksi --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Transaksi</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center md:items-baseline mt-1">
            <span class="text-2xl md:text-3xl font-bold text-gray-800 md:mr-2">20</span>
            <span class="text-xs md:text-sm text-gray-400">Sales</span>
        </div>
    </div>

    {{-- Card 2: Unit Terjual --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Unit Terjual</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center md:items-baseline mt-1">
            <span class="text-2xl md:text-3xl font-bold text-gray-800 md:mr-2">150</span>
            <span class="text-xs md:text-sm text-gray-400">Unit</span>
        </div>
    </div>

    {{-- Card 3: Total Penjualan --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Total Penjualan</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
        <div class="mt-1">
            {{-- Mobile: text-2xl (Seragam) --}}
            <span class="block md:hidden text-2xl font-bold text-gray-800">Rp 5.0jt</span>
            {{-- Desktop: text-2xl (Full Format) --}}
            <span class="hidden md:block text-2xl font-bold text-gray-800">Rp 5.000.000</span>
        </div>
    </div>

    {{-- Card 4: Komisi Hari Ini --}}
    <div class="bg-white p-4 rounded-xl shadow-sm border border-blue-100 flex flex-col justify-center items-center text-center md:justify-between md:items-start md:text-left h-full">
        <div class="flex flex-col md:flex-row justify-between items-center md:items-start w-full mb-2">
            <span class="text-[10px] md:text-xs text-blue-500 font-semibold bg-blue-50 px-2 py-1 rounded">Komisi Hari Ini</span>
            <div class="p-1 bg-blue-50 rounded-full text-blue-400 hidden md:block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>
        <div class="mt-1">
             <span class="block md:hidden text-2xl font-bold text-gray-800">Rp 3.0jt</span>
             <span class="hidden md:block text-2xl font-bold text-gray-800">Rp 3.000.000</span>
        </div>
    </div>
</div>

{{-- 3. TARGET SECTION --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-6 mb-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h3 class="font-bold text-gray-800 text-lg">Target Penjualan</h3>
            <p class="text-gray-400 text-sm">Desember 2025</p>
        </div>
    </div>
    <div class="mb-6">
        <div class="flex justify-between text-sm mb-2">
            <span class="text-gray-500">Target</span>
            <span class="font-bold text-gray-800">Rp 25.000.000</span>
        </div>
        <div class="flex justify-between text-sm mb-3">
            <span class="text-gray-500">Realisasi</span>
            <span class="font-bold text-green-500">Rp 4.500.000</span>
        </div>
        <div class="relative w-full h-4 bg-gray-100 rounded-full overflow-hidden">
            <div class="absolute top-0 left-0 h-full bg-blue-600 rounded-full" style="width: 34.8%"></div>
        </div>
        <div class="flex justify-end mt-2">
            <span class="bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded-lg">34,8%</span>
        </div>
    </div>
    
    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
        <h4 class="font-semibold text-gray-700 mb-3 text-sm">Estimasi Gaji</h4>
        <div class="space-y-2">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Gaji Pokok</span>
                <span class="font-medium text-gray-800">Rp 4.500.000</span>
            </div>
            <div class="flex justify-between text-sm border-b border-gray-200 pb-2">
                <span class="text-gray-500">Komisi (5%)</span>
                <span class="font-medium text-green-600">+ Rp 425.000</span>
            </div>
            <div class="flex justify-between font-bold text-blue-600 pt-1 text-base">
                <span>Estimasi Total</span>
                <span>Rp 4.925.000</span>
            </div>
        </div>
    </div>
</div>

{{-- 4. TRANSAKSI SECTION --}}
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 md:p-8">
    
    {{-- Header Transaksi --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="font-bold text-xl text-gray-900">Transaksi Hari Ini</h3>
            <p class="text-gray-400 text-sm mt-1">Riwayat penjualan terbaru</p>
        </div>
        
        {{-- Sort Dropdown --}}
        <div class="relative w-full md:w-auto">
            <button id="sortButton" class="w-full md:w-56 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 flex items-center justify-between cursor-pointer hover:bg-gray-100 transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                <span class="text-xs text-gray-500">Sort by : <span id="sortLabel" class="font-bold text-gray-800">Newest</span></span>
                <svg id="sortIcon" class="w-3 h-3 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="sortDropdown" class="hidden absolute right-0 mt-2 w-full bg-white rounded-xl shadow-xl border border-gray-100 z-20 overflow-hidden">
                <a href="#" onclick="selectSort('Newest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50">Newest</a>
                <a href="#" onclick="selectSort('Oldest')" class="block px-4 py-3 text-sm text-gray-700 hover:bg-blue-50">Oldest</a>
            </div>
        </div>
    </div>

    {{-- A. TAMPILAN MOBILE (Card List) --}}
    <div class="space-y-4 md:hidden">
        
        {{-- Card 1 --}}
        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50/50">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <h4 class="font-bold text-gray-800">Jane Cooper</h4>
                    <p class="text-xs text-gray-500">Toko Maju Jaya</p>
                </div>
                <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-full">123 Unit</span>
            </div>
            <div class="flex justify-between items-center text-sm mb-3">
                <span class="text-gray-500">Produk A - Premium</span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                <div>
                    <p class="text-xs text-gray-400">Total</p>
                    <p class="font-bold text-blue-600">Rp 12.300.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400">Komisi</p>
                    <span class="font-bold text-gray-800">Rp 615.000</span>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50/50">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <h4 class="font-bold text-gray-800">Floyd Miles</h4>
                    <p class="text-xs text-gray-500">Makmur Sentosa</p>
                </div>
                <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-full">50 Unit</span>
            </div>
            <div class="flex justify-between items-center text-sm mb-3">
                <span class="text-gray-500">Produk B - Lite</span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                <div>
                    <p class="text-xs text-gray-400">Total</p>
                    <p class="font-bold text-blue-600">Rp 5.000.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400">Komisi</p>
                    <span class="font-bold text-gray-800">Rp 250.000</span>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50/50">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <h4 class="font-bold text-gray-800">Ronald Richards</h4>
                    <p class="text-xs text-gray-500">Berkah Abadi</p>
                </div>
                <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-full">25 Unit</span>
            </div>
            <div class="flex justify-between items-center text-sm mb-3">
                <span class="text-gray-500">Produk C - Standard</span>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                <div>
                    <p class="text-xs text-gray-400">Total</p>
                    <p class="font-bold text-blue-600">Rp 3.750.000</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400">Komisi</p>
                    <span class="font-bold text-gray-800">Rp 187.500</span>
                </div>
            </div>
        </div>

        {{-- CONTAINER HIDDEN --}}
        <div id="hiddenTransactions" class="space-y-4 hidden">
            {{-- Card 4 --}}
            <div class="border border-gray-100 rounded-xl p-4 bg-gray-50/50">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <h4 class="font-bold text-gray-800">Marvin McKinney</h4>
                        <p class="text-xs text-gray-500">Toko Sejahtera</p>
                    </div>
                    <span class="bg-blue-100 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-full">10 Unit</span>
                </div>
                <div class="flex justify-between items-center text-sm mb-3">
                    <span class="text-gray-500">Produk A - Premium</span>
                </div>
                <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                    <div>
                        <p class="text-xs text-gray-400">Total</p>
                        <p class="font-bold text-blue-600">Rp 2.500.000</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-400">Komisi</p>
                        <span class="font-bold text-gray-800">Rp 125.000</span>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- TOMBOL TOGGLE --}}
        <button id="toggleTransactionsBtn" class="w-full py-3 text-center text-blue-600 font-semibold text-sm bg-blue-50 rounded-lg mt-2 hover:bg-blue-100 transition">
            Lihat Semua Transaksi
        </button>
    </div>

    {{-- B. TAMPILAN DESKTOP (Full Table) --}}
    <div class="hidden md:block overflow-x-auto">
        <table class="min-w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-sm text-gray-400 border-b border-gray-100">
                    <th class="pb-4 font-normal">Nama Sales</th>
                    <th class="pb-4 font-normal">Pelanggan</th>
                    <th class="pb-4 font-normal">Produk</th>
                    <th class="pb-4 font-normal">Unit</th>
                    <th class="pb-4 font-normal">Total</th>
                    <th class="pb-4 font-normal">Komisi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                {{-- Row 1 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50">
                    <td class="py-5 font-medium text-gray-800">Jane Cooper</td>
                    <td class="py-5 text-gray-500">Toko Maju Jaya</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">123 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 12.300.000</td>
                    <td class="py-5"><span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">Rp 615.000</span></td>
                </tr>
                {{-- Row 2 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50">
                    <td class="py-5 font-medium text-gray-800">Floyd Miles</td>
                    <td class="py-5 text-gray-500">Makmur Sentosa</td>
                    <td class="py-5 text-gray-500">Produk B - Lite</td>
                    <td class="py-5 text-blue-500 font-medium">50 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 5.000.000</td>
                    <td class="py-5"><span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">Rp 250.000</span></td>
                </tr>
                {{-- Row 3 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50">
                    <td class="py-5 font-medium text-gray-800">Ronald Richards</td>
                    <td class="py-5 text-gray-500">Berkah Abadi</td>
                    <td class="py-5 text-gray-500">Produk C - Standard</td>
                    <td class="py-5 text-blue-500 font-medium">25 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 3.750.000</td>
                    <td class="py-5"><span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">Rp 187.500</span></td>
                </tr>
                {{-- Row 4 --}}
                <tr class="group hover:bg-gray-50 transition-colors border-b border-gray-50">
                    <td class="py-5 font-medium text-gray-800">Marvin McKinney</td>
                    <td class="py-5 text-gray-500">Toko Sejahtera</td>
                    <td class="py-5 text-gray-500">Produk A - Premium</td>
                    <td class="py-5 text-blue-500 font-medium">10 Unit</td>
                    <td class="py-5 text-blue-500 font-medium">Rp 2.500.000</td>
                    <td class="py-5"><span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">Rp 125.000</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // 1. Sort Dropdown
    function selectSort(value) {
        document.getElementById('sortLabel').innerText = value;
        toggleSortDropdown();
    }
    function toggleSortDropdown() {
        const dropdown = document.getElementById('sortDropdown');
        const icon = document.getElementById('sortIcon');
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            dropdown.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Init Dropdown
        const sortButton = document.getElementById('sortButton');
        const sortDropdown = document.getElementById('sortDropdown');
        if(sortButton){
            sortButton.addEventListener('click', function(e) { e.stopPropagation(); toggleSortDropdown(); });
            document.addEventListener('click', function(event) {
                if (!sortButton.contains(event.target) && !sortDropdown.contains(event.target)) {
                    if (!sortDropdown.classList.contains('hidden')) {
                        sortDropdown.classList.add('hidden');
                        document.getElementById('sortIcon').classList.remove('rotate-180');
                    }
                }
            });
        }

        // 2. Logic Toggle Lihat Lebih Banyak / Sedikit
        const toggleBtn = document.getElementById('toggleTransactionsBtn');
        const hiddenTrans = document.getElementById('hiddenTransactions');

        if(toggleBtn && hiddenTrans) {
            toggleBtn.addEventListener('click', function() {
                hiddenTrans.classList.toggle('hidden');

                if (hiddenTrans.classList.contains('hidden')) {
                    toggleBtn.innerText = "Lihat Semua Transaksi";
                } else {
                    toggleBtn.innerText = "Lihat Lebih Sedikit";
                }
            });
        }
    });
</script>

@endsection