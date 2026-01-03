@extends('layouts.sales')

@section('content')

    {{-- LOGIC: AMBIL DATA USER & SALES --}}
    @php
        $user = auth()->user();
        $sales = $user->sales; // Mengambil data dari relasi tabel sales
    @endphp

    {{-- KONTEN PROFIL --}}
    <div class="w-full max-w-4xl mx-auto pt-4 pb-20"> 
        
        {{-- Card Form Profil --}}
        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 md:p-10 relative"> 
            
            <form action="#" method="POST">
                @csrf
                @method('PUT') 
                
                {{-- FOTO PROFIL (Masih Statis karena belum ada kolom foto di DB) --}}
                <div class="flex justify-center -mt-4 mb-8">
                    <div class="relative">
                        <div class="w-28 h-28 md:w-32 md:h-32 rounded-full overflow-hidden border-4 border-gray-100 shadow-sm">
                            <img src="{{ asset('images/Profil.png') }}" alt="Foto Profil" class="w-full h-full object-cover">
                        </div>
                        <button type="button" class="absolute bottom-0 right-0 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-md border-4 border-white transition transform hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                    </div>
                </div>

                {{-- FORM FIELDS --}}
                <div class="space-y-6">
                    
                    {{-- 1. Nama Lengkap --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Nama Lengkap</label>
                        <div class="relative">
                            <input type="text" 
                                   name="nama_lengkap" 
                                   value="{{ old('nama_lengkap', $sales->nama_lengkap ?? $user->username) }}" 
                                   class="w-full py-3 pl-6 pr-12 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white truncate">
                            
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Alamat --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Alamat</label>
                        <div class="relative">
                            <input type="text" 
                                   name="alamat" 
                                   value="{{ old('alamat', $sales->alamat ?? '-') }}" 
                                   class="w-full py-3 pl-6 pr-14 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white truncate">
                            
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- 3. Telepon / Kontak --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">No. Telepon</label>
                        <div class="relative">
                            <input type="text" 
                                   name="kontak" 
                                   value="{{ old('kontak', $sales->kontak ?? '-') }}" 
                                   class="w-full py-3 pl-6 pr-12 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white truncate">
                            
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- 4. Email --}}
                    <div>
                        <label class="block text-base font-bold text-gray-800 mb-2 ml-2">Email</label>
                        <div class="relative">
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email', $sales->email ?? '-') }}" 
                                   class="w-full py-3 pl-6 pr-12 rounded-full border border-gray-400 text-gray-600 placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition bg-white truncate">
                            
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-between items-center mt-10 md:mt-12 px-2 gap-4">
                    <a href="{{ route('sales.dashboard') }}" class="w-full text-center py-3 bg-red-600 hover:bg-red-700 text-white font-bold rounded-full shadow-lg transition transform active:scale-95">Cancel</a>
                    <button type="submit" class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full shadow-lg transition transform active:scale-95">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection