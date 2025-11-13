<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.427-.428 1.121-.428 1.548 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125h9.75a1.125 1.125 0 001.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </div>
            <h1 class="font-bold text-blue-700 text-lg">Dashboard Publik</h1>
        </div>

        <div class="flex gap-6">
            <a href="{{ route('kategori_aset.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>

            <a href="#tabelAset"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-list-alt"></i> Kategori Aset
            </a>

            <a href="{{ route('warga.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-users"></i> Warga
            </a>
            <a href="{{ route('about') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-info-circle"></i> About
            </a>
            <a href="{{ route('user.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-user-circle"></i> User
            </a>

        </div>
    </div>
</header>
