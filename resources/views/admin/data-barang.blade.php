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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komisi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
                {{-- Data Jane Cooper / PRD-001 --}}
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Cooper</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-001</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">5%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                    </td>
                </tr>
                
                {{-- Data Floyd Miles / PRD-002 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Floyd Miles</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-002</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">4.5%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Habis</span>
                    </td>
                </tr>
                
                {{-- Data Ronald Richards / PRD-003 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ronald Richards</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-003</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 9.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">4%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Habis</span>
                    </td>
                </tr>

                 {{-- Data Marvin McKinney / PRD-004 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Marvin McKinney</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-004</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 2</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">6%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                    </td>
                </tr>

                 {{-- Data Jerome Bell / PRD-005 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jerome Bell</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-005</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">5%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                    </td>
                </tr>
                 
                 {{-- Data Kathryn Murphy / PRD-006 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kathryn Murphy</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-006</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 3</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">4%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                    </td>
                </tr>
                 
                 {{-- Data Jacob Jones / PRD-007 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jacob Jones</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-007</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 4</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">6%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                    </td>
                </tr>
                 
                 {{-- Data Kristin Watson / PRD-008 --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Kristin Watson</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">PRD-008</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Kategori 4</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.00</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 font-medium">5%</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Habis</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    
    {{-- Footer --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data 1 to 8 of 256k entries
    </div>
</div>

@endsection