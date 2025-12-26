{{-- resources/views/admin/data-sales.blade.php --}}
@extends('layouts.admin')

@section('content')

{{-- KARTU UTAMA TABEL --}}
<div class="bg-white p-6 rounded-2xl shadow-lg" x-data="{ 
            openModal: false, 
            isEdit: false,
            formData: {
                id: '',
                nama_lengkap: '',
                kontak: '',
                jabatan: '',
                gaji_pokok: '',
                target_penjualan_bln: '',
                status_aktif: '1'
            },
            actionUrl: ''
        }">
    
    {{-- Header Tabel & Tombol Tambah --}}
        <div>
        
        {{-- Header Tabel & Tombol Tambah --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Data Karyawan Sales</h2>
                <p class="text-sm text-green-600">Kelola informasi karyawan sales dan gaji pokok</p> 
            </div>
            
            <div class="flex items-center space-x-4">
                {{-- Tombol Tambah (Diberi trigger @click) --}}
                <button @click="
                            isEdit = false; 
                            formData = { id: '', nama_lengkap: '', kontak: '', jabatan: 'Junior Sales', gaji_pokok: '', target_penjualan_bln: '', status_aktif: '1' };
                            actionUrl = '{{ route('admin.sales.store') }}'; 
                            openModal = true;" 
                            class="flex items-center space-x-2 bg-green-500 text-white font-semibold py-2 px-4 rounded-full shadow-md hover:bg-green-600 transition duration-150">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            <span>Tambah</span>
                </button>

                {{-- Dropdown Sort By --}}
                <div class="flex items-center text-sm text-gray-600">
                    <span class="mr-2 whitespace-nowrap">Sort by:</span>
                    <select class="border border-gray-300 rounded-md py-1 px-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                        <option>Newest</option>
                        <option>Oldest</option>
                        <option>Highest Commission</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- MODAL AREA --}}
        <div x-show="openModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
            {{-- Layer Latar Belakang (Semi Hitam Transparan) --}}
            <div x-show="openModal" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm" 
                @click="openModal = false">
            </div>

            {{-- Layer Form (Putih Solid) --}}
            <div x-show="openModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                class="bg-white rounded-xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto relative z-10">
                    
                <button @click="openModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="p-2">
                    @include('admin.partials.form-sales')
                </div>
            </div>
        </div>

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
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2 flex items-center">
                            <button @click="
                                isEdit = true; 
                                formData = {
                                    id: '{{ $item->id }}',
                                    nama_lengkap: '{{ $item->nama_lengkap }}',
                                    kontak: '{{ $item->kontak }}',
                                    jabatan: '{{ $item->jabatan }}',
                                    gaji_pokok: '{{ $item->gaji_pokok }}',
                                    target_penjualan_bln: '{{ $item->target_penjualan_bln }}',
                                    status_aktif: '{{ $item->status_aktif }}'
                                };
                                actionUrl = '/admin/sales/' + formData.id; 
                                openModal = true;"
                                class="inline-block px-3 py-1 text-xs font-semibold text-blue-500 border border-blue-300 rounded-lg hover:bg-blue-50 transition duration-150">
                                Edit
                            </button>
                            
                          
                            <form action="{{ route('admin.sales.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    class="px-3 py-1 text-xs font-semibold text-red-500 border border-red-300 rounded-lg hover:bg-red-50 transition duration-150 ml-2"
                                    @click="
                                        Swal.fire({
                                            title: 'Yakin?',
                                            text: 'Data akan dihapus permanen',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Ya',
                                            cancelButtonText: 'Batal'
                                        }).then(result => {
                                            if (result.isConfirmed) {
                                                $el.closest('form').submit();
                                            }
                                        })
                                    "
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m6 0H6"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
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