{{-- resources/views/admin/data-barang.blade.php --}}

@extends('layouts.admin')

@section('content')

{{-- KARTU UTAMA TABEL --}}
<div class="bg-white p-6 rounded-2xl shadow-lg">
    
    {{-- Header Tabel & Sort By --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-800">Data Barang</h2>
            <p class="text-sm text-green-600">Informasi data barang</p>
        </div>
        
        {{-- Dropdown Sort By --}}
        <div class="flex items-center text-sm text-gray-600">
            <span class="mr-2">Short by:</span>
            <select class="border border-gray-300 rounded-md py-1 px-3">
                <option>Newest</option>
                <option>Oldest</option>
                <option>Highest Commission</option>
            </select>
        </div>
    </div>

    {{-- Tabel Data Barang --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Jual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
            @foreach ($produk as $item)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $item->nama_produk }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    {{ $item->kode_produk }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                    Umum
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">
                    Rp {{ number_format($item->harga_jual_unit, 0, ',', '.') }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 font-medium">
                    {{ $item->stok }} Unit
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    @if($item->stok > 0)
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Tersedia
                        </span>
                    @else
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Habis
                        </span>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
    {{-- Footer --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data 1 to 8 of 256k entries
    </div>
</div>

@endsection