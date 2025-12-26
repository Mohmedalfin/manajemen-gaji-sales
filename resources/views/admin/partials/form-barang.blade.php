{{-- resources/views/admin/partials/create-barang.blade.php --}}
<div class="bg-white p-10">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800"
            x-text="isEdit ? 'Edit Data Produk' : 'Tambah Data Produk'">
        </h2>
        <p class="text-sm text-gray-500">
            Lengkapi informasi produk dengan benar.
        </p>  
    </div>

    {{-- Ganti '#' dengan route store barang Anda --}}
    <form :action="actionUrl" method="POST" class="space-y-6">
        @csrf
        <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">
       
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="flex flex-col md:col-span-2">
                <label class="mb-2 text-sm font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk" required placeholder="Contoh: Sepatu Lari Pro" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500  focus:border-transparent outline-none transition">
            </div>

            {{-- <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">SKU (Stock Keeping Unit)</label>
                <input type="text" name="sku" required placeholder="Contoh: BRG-001" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500  outline-none transition">
            </div> --}}

            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Jumlah Stok</label>
                <input type="number" name="stok" required placeholder="0" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500  outline-none transition">
            </div>

            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Harga Jual (Rp)</label>
                <input type="number" name="harga_jual_unit" required placeholder="Contoh: 150000" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500  outline-none transition">
            </div>

            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Status Stok</label>
                <div class="flex items-center space-x-6 mt-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="status" value="Tersedia" checked class="w-4 h-4 text-blue-500 focus:ring-blue-500 ">
                        <span class="ml-2 text-sm text-gray-600">Tersedia</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="status" value="Habis" class="w-4 h-4 text-green-500 focus:ring-green-500">
                        <span class="ml-2 text-sm text-gray-600">Habis</span>
                    </label>
                </div>
            </div>

        </div>

        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-100">
            <button type="button" @click="openModal = false" 
                class="px-6 py-2 bg-gray-100 text-gray-600 font-semibold rounded-lg hover:bg-gray-200 transition">
                Batal
            </button>
            <button
                type="submit"
                class="px-5 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600"
                x-text="isEdit ? 'Update Produk' : 'Simpan Produk'"
            >
            </button>
        </div>
    </form>
</div>