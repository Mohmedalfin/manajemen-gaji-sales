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
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Jane Cooper</div>
                        <div class="text-xs text-gray-500">ID: 0001</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@janecooper</div>
                        <div class="text-xs text-gray-500">(225) 555-0118</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Senior Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">15/03/2023</td>
                    {!! $actionTpl !!}
                </tr>
                
                {{-- Data Floyd Miles --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Floyd Miles</div>
                        <div class="text-xs text-gray-500">ID: 0002</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@flyodmiles</div>
                        <div class="text-xs text-gray-500">(205) 555-0100</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Senior Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">12/04/2023</td>
                    {!! $actionTpl !!}
                </tr>
                
                {{-- Data Ronald McKinney --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Ronald McKinney</div>
                        <div class="text-xs text-gray-500">ID: 0003</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@ronaldrich</div>
                        <div class="text-xs text-gray-500">(302) 555-0107</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Senior Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">24/05/2023</td>
                    {!! $actionTpl !!}
                </tr>

                 {{-- Data Marvin McKinney --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Marvin McKinney</div>
                        <div class="text-xs text-gray-500">ID: 0004</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@marvinmc</div>
                        <div class="text-xs text-gray-500">(292) 555-0126</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Executive Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 8.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">25/01/2024</td>
                    {!! $actionTpl !!}
                </tr>

                 {{-- Data Jerome Bell --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Jerome Bell</div>
                        <div class="text-xs text-gray-500">ID: 0005</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@jeromeb</div>
                        <div class="text-xs text-gray-500">(629) 555-0129</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Executive Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 6.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">01/04/2024</td>
                    {!! $actionTpl !!}
                </tr>
                 
                 {{-- Data Kathryn Murphy --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Kathryn Murphy</div>
                        <div class="text-xs text-gray-500">ID: 0006</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@kathmur</div>
                        <div class="text-xs text-gray-500">(406) 555-0120</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Executive Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 6.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">11/05/2024</td>
                    {!! $actionTpl !!}
                </tr>
                 
                 {{-- Data Jacob Jones --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Jacob Jones</div>
                        <div class="text-xs text-gray-500">ID: 0007</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@jacobjojo</div>
                        <div class="text-xs text-gray-500">(208) 555-0112</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Junior Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 4.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">15/03/2025</td>
                    {!! $actionTpl !!}
                </tr>
                 
                 {{-- Data Kristin Watson --}}
                 <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="font-semibold">Kristin Watson</div>
                        <div class="text-xs text-gray-500">ID: 0008</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <div class="text-blue-600">@kristinwat</div>
                        <div class="text-xs text-gray-500">(704) 555-0127</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Junior Sales</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 font-medium">Rp 4.500.000</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">12/04/2025</td>
                    {!! $actionTpl !!}
                </tr>

            </tbody>
        </table>
    </div>
    
    {{-- Footer Pagination --}}
    <div class="mt-4 text-sm text-gray-500">
        Showing data 1 to 8 of 256k entries
    </div>
</div>

@endsection