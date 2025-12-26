<div class="bg-white p-10">
    <div class="mb-6">
        {{-- Judul Dinamis berdasarkan status isEdit --}}
        <h2 class="text-2xl font-bold text-gray-800" x-text="isEdit ? 'Edit Data Sales' : 'Tambah Data Sales'"></h2>
        <p class="text-sm text-gray-500">Lengkapi formulir di bawah untuk mengelola informasi anggota sales.</p>
    </div>

    <form :action="actionUrl" method="POST" class="space-y-6">
        @csrf
        {{-- Menggunakan Method PUT secara otomatis jika isEdit true --}}
        
        <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- Nama Lengkap --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" x-model="formData.nama_lengkap" required 
                    placeholder="Masukkan nama lengkap" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>

            {{-- Kontak --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Kontak (WhatsApp/Telp)</label>
                <input type="text" name="kontak" x-model="formData.kontak" required 
                    placeholder="0812xxxx" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>

            {{-- Jabatan --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Jabatan</label>
                <select name="jabatan" x-model="formData.jabatan" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition cursor-pointer">
                    <option value="Junior Sales">Junior Sales</option>
                    <option value="Senior Sales">Senior Sales</option>
                    <option value="Sales Manager">Sales Manager</option>
                </select>
            </div>

            {{-- Gaji Pokok --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Gaji Pokok (Rp)</label>
                <input type="number" name="gaji_pokok" x-model="formData.gaji_pokok" required 
                    placeholder="Contoh: 5000000" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>

            {{-- Target Bulanan --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Target Penjualan Bulanan</label>
                <input type="number" name="target_penjualan_bln" x-model="formData.target_penjualan_bln" required 
                    placeholder="Masukkan nominal target" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>

            {{-- Status Karyawan --}}
            <div class="flex flex-col">
                <label class="mb-2 text-sm font-semibold text-gray-700">Status Karyawan</label>
                <div class="flex items-center space-x-6 mt-2">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="status_aktif" value="1" x-model="formData.status_aktif" 
                            class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Aktif</span>
                    </label>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="radio" name="status_aktif" value="0" x-model="formData.status_aktif" 
                            class="w-4 h-4 text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Non-Aktif</span>
                    </label>
                </div>
            </div>

        </div>

        {{-- Footer Tombol --}}
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-100">
            <button type="button" @click="openModal = false" 
                class="px-6 py-2 bg-gray-100 text-gray-600 font-semibold rounded-lg hover:bg-gray-200 transition">
                Batal
            </button>
            <button type="submit" 
                class="px-6 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 shadow-lg shadow-green-200 transition"
                x-text="isEdit ? 'Update Data Sales' : 'Simpan Data Sales'">
            </button>
        </div>
    </form>
</div>