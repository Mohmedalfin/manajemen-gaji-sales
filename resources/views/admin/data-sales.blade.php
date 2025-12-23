{{-- resources/views/admin/data-sales.blade.php --}}
@extends('layouts.admin')

@section('content')

{{-- KARTU UTAMA TABEL --}}
<div class="bg-white p-6 rounded-2xl shadow-lg">
    
    {{-- Header Tabel & Tombol Tambah --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Data Karyawan Sales</h2>
            <p class="text-sm text-green-600">Kelola informasi karyawan sales dan gaji pokok</p> 
        </div>
        
        {{-- Tombol Tambah --}}
        <button class="flex items-center space-x-2 bg-green-500 text-white font-semibold py-2 px-4 rounded-full shadow-md hover:bg-green-600 transition duration-150">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            <span>Tambah</span>
        </button>
    </div>

    {{-- Tabel Data Karyawan Sales --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji Pokok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Target Penjualan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bergabung</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
                @php
                    $actionTpl = '
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex items-center">
                            <a href="#" class="inline-block px-3 py-1 text-xs font-semibold 
                                               text-blue-500 border border-blue-300 rounded-lg 
                                               hover:bg-blue-50 transition duration-150">
                                Edit
                            </a>
                            <button class="px-3 py-1 text-xs font-semibold 
                                           text-red-500 border border-red-300 rounded-lg 
                                           hover:bg-red-50 transition duration-150 ml-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m6 0H6"></path></svg>
                            </button>
                        </td>
                    ';
                @endphp
                
                {{-- Data Jane Cooper --}}
                @forelse ($sales as $item)
                    <tr>
                        {{-- Nama + ID --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="font-semibold">{{ $item->nama_lengkap }}</div>
                            <div class="text-xs text-gray-500">{{ $item->kode_sales }}</div>
                        </td>

                        {{-- Kontak --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="text-xs text-gray-500">
                                {{ $item->kontak ?? '-' }}
                            </div>
                        </td>

                        {{-- Jabatan --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $item->jabatan }}
                        </td>

                        {{-- Gaji --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">
                            Rp {{ number_format($item->gaji_pokok, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">
                            Rp {{ number_format($item->target_penjualan_bln, 0, ',', '.') }}
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($item->status_aktif)
                                <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        {{-- Created At --}}
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>

                        {{-- Action --}}
                        {!! $actionTpl !!}
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data sales
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    {{-- Footer Pagination --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data 1 to 8 of 256k entries
    </div>
</div>

@endsection