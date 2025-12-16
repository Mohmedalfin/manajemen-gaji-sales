<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Clarity Sales</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen h-screen overflow-hidden">
    
    @include('admin.partials.sidebar')
    
    <main class="flex-1 p-8 overflow-y-auto">
        
        <header class="flex justify-between items-center mb-10">
            
            {{-- Placeholder kiri (Mengimbangi Avatar di kanan) --}}
            <div class="w-10 h-10"></div> 
            
            {{-- KOTAK TELUSURI --}}
            <div class="relative w-full max-w-lg mx-auto"> 
                
                {{-- Input Field --}}
                <input type="text" placeholder="Telusuri" 
                    class="w-full p-3 pl-4 
                           border-2 border-blue-400  
                           rounded-full 
                           focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
                           text-gray-700 placeholder-blue-500 font-medium 
                           shadow-md outline-none">
                
                {{-- Icon Pencarian (Diposisikan di kanan) --}}
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
            
            {{-- Profil Avatar (Kanan) --}}
            <div class="w-10 h-10 rounded-full overflow-hidden">
                <img src="{{ asset('images/Profil.png') }}" alt="Foto Profil Admin" class="w-full h-full object-cover">
            </div>
        </header>

        @yield('content')
    </main>
</div>

</body>
</html>