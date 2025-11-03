<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">A
            </div>
            <h1 class="font-bold text-blue-700 text-lg">Dashboard Publik</h1>
        </div>

        <!-- Bagian Kanan Header untuk Navigasi -->
        <div class="flex gap-6">
            <!-- Link ke halaman About -->
            <a href="{{ route('about') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">About</a>

            <!-- Link ke halaman Kategori Aset -->
            <a href="{{ route('kategori_aset.index') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Kategori Aset</a>

            <!-- Link ke halaman Warga -->
            <a href="{{ route('warga.index') }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Warga</a>
        </div>
    </div>
</header>
