@extends('layouts.sales')

@section('content')
<div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-4 md:p-8 max-w-4xl mx-auto mt-6 md:mt-10">
    
    <div class="mb-6 md:mb-8">
        <h3 class="text-xl font-bold text-gray-800">Ubah Kata Sandi</h3>
        <p class="text-sm text-gray-400">Pastikan kata sandi baru Anda kuat dan aman.</p>
    </div>

    {{-- Form Ubah Password --}}
    <form action="{{ route('sales.password.update') }}" method="POST"> 
        @csrf
        @method('PUT')
        
        <div class="space-y-5 md:space-y-6">
            
            {{-- 1. Input Email (Read Only) --}}
            <div>
                <label class="block text-base md:text-lg font-bold text-gray-800 mb-2 ml-1">Email</label>
                <div class="relative">
                    <input type="email" 
                           name="email" 
                           class="w-full py-3 px-6 rounded-full border border-gray-400 bg-gray-100 text-gray-500 focus:outline-none cursor-not-allowed"
                           value="{{ auth()->user()->email ?? '' }}"
                           readonly>
                </div>
            </div>

            {{-- 2. Kata Sandi Saat Ini --}}
            <div>
                <label class="block text-base md:text-lg font-bold text-gray-800 mb-2 ml-1">Kata Sandi Saat Ini</label>
                <div class="relative">
                    <input type="password" 
                           name="current_password" 
                           placeholder="Masukkan kata sandi lama"
                           class="password-input w-full py-3 px-6 pr-12 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition"
                           required>
                    
                    <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                        <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-.722-3.25"/>
                            <path d="M2 8a10.645 10.645 0 0 0 20 0"/>
                            <path d="m20 15l-1.726-2.05"/>
                            <path d="m4 15l1.726-2.05"/>
                            <path d="m9 18l.722-3.25"/>
                        </svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </span>
                </div>
                @error('current_password')
                    <p class="text-red-500 text-sm mt-1 ml-4">{{ $message }}</p>
                @enderror
            </div>

            {{-- 3. Kata Sandi Baru --}}
            <div>
                <label class="block text-base md:text-lg font-bold text-gray-800 mb-2 ml-1">Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password" 
                           placeholder="Masukkan kata sandi baru"
                           class="password-input w-full py-3 px-6 pr-12 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition"
                           required>
                    
                    <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                         <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-.722-3.25"/>
                            <path d="M2 8a10.645 10.645 0 0 0 20 0"/>
                            <path d="m20 15l-1.726-2.05"/>
                            <path d="m4 15l1.726-2.05"/>
                            <path d="m9 18l.722-3.25"/>
                        </svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </span>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1 ml-4">{{ $message }}</p>
                @enderror
            </div>

            {{-- 4. Konfirmasi Kata Sandi Baru --}}
            <div>
                <label class="block text-base md:text-lg font-bold text-gray-800 mb-2 ml-1">Konfirmasi Kata Sandi Baru</label>
                <div class="relative">
                    <input type="password" 
                           name="password_confirmation" 
                           placeholder="Ulangi kata sandi baru"
                           class="password-input w-full py-3 px-6 pr-12 rounded-full border border-gray-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-gray-600 placeholder-gray-400 transition"
                           required>
                    
                    <span class="toggle-password absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-blue-600 transition p-2">
                         <svg class="eye-icon-closed h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-.722-3.25"/>
                            <path d="M2 8a10.645 10.645 0 0 0 20 0"/>
                            <path d="m20 15l-1.726-2.05"/>
                            <path d="m4 15l1.726-2.05"/>
                            <path d="m9 18l.722-3.25"/>
                        </svg>
                        <svg class="eye-icon-open h-6 w-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </span>
                </div>
            </div>

        </div>

        <div class="flex flex-row justify-between items-center mt-10 md:mt-12 gap-4">
            <a href="{{ route('sales.dashboard') }}" 
               class="w-full py-3 rounded-full bg-red-600 text-white font-bold shadow-md hover:bg-red-700 transition transform active:scale-95 text-center">
                Cancel
            </a>

            <button type="submit" 
                    class="w-full py-3 rounded-full bg-blue-500 text-white font-bold shadow-md hover:bg-blue-600 transition transform active:scale-95">
                Save
            </button>
        </div>

    </form>
</div>

{{-- SCRIPT TOGGLE PASSWORD --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButtons = document.querySelectorAll('.toggle-password');
        toggleButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                const container = button.closest('.relative');
                const passwordInput = container.querySelector('.password-input');
                const eyeOpen = button.querySelector('.eye-icon-open');
                const eyeClosed = button.querySelector('.eye-icon-closed');

                if (passwordInput) {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    eyeOpen.classList.toggle('hidden');
                    eyeClosed.classList.toggle('hidden');
                }
            });
        });
    });
</script>
@endsection