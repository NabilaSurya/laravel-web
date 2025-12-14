<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm" x-data="{ openMenu: false }">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-6 py-3">

        <div class="flex items-center gap-2">
            <div class="w-9 h-9 flex items-center justify-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo Aset Desa" class="w-full h-full object-contain">
            </div>
            <h1 class="font-bold text-gray-800 text-lg">Portal Aset Publik</h1>
        </div>

        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('kategori_aset.index') }}"
                class="text-gray-600 hover:text-blue-700 transition duration-300 flex items-center gap-1 font-medium">
                <i class="fas fa-chart-pie w-4 text-blue-600"></i> Dashboard
            </a>

            <a href="#tabelAset"
                class="text-gray-600 hover:text-blue-700 transition duration-300 flex items-center gap-1 font-medium">
                <i class="fas fa-layer-group w-4 text-blue-600"></i> Kategori Aset
            </a>

            <a href="{{ route('warga.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-users"></i> Warga
            </a>

            <a href="{{ route('user.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-user-circle"></i> User
            </a>

            <a href="{{ route('about') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-info-circle"></i> About
            </a>

            <a href="{{ route('pengembang') }}"
                class="text-gray-600 hover:text-blue-700 transition duration-300 flex items-center gap-1 font-medium">
                <i class="fas fa-user-gear w-4 text-blue-600"></i> Pengembang
            </a>

            <a href="{{ route('user.index') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 shadow-md text-sm font-semibold">
                <i class="fas fa-user-circle mr-1"></i> Login Operator
            </a>
        </div>

        <button @click="openMenu = !openMenu"
            class="md:hidden text-gray-700 hover:text-blue-700 text-xl focus:outline-none transition-transform duration-300 ease-in-out">
            <i class="fas fa-bars" x-show="!openMenu" x-cloak></i>
            <i class="fas fa-times" x-show="openMenu" x-cloak></i>
        </button>

        <div x-cloak x-show="openMenu" @click.outside="openMenu = false"
            class="absolute right-4 top-16 bg-white border border-gray-100 shadow-xl rounded-xl w-64 py-2 ring-1 ring-gray-200/50 md:hidden">

            <a href="{{ route('kategori_aset.index') }}"
                class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg mx-2 my-1 font-medium">
                <i class="fas fa-chart-pie mr-3 w-5 text-blue-600"></i> Dashboard
            </a>

            <a href="#tabelAset"
                class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg mx-2 my-1 font-medium">
                <i class="fas fa-layer-group mr-3 w-5 text-blue-600"></i> Kategori Aset
            </a>

            <a href="{{ route('warga.index') }}"
                class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg mx-2 my-1 font-medium">
                <i class="fas fa-users mr-3 w-5 text-blue-600"></i> Warga
            </a>

            <a href="{{ route('about') }}"
                class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg mx-2 my-1 font-medium">
                <i class="fas fa-info-circle mr-3 w-5 text-blue-600"></i> About
            </a>

            <a href="{{ route('user.index') }}"
                class="block px-4 py-3 text-white bg-blue-600 hover:bg-blue-700 transition rounded-b-xl mt-2 font-semibold text-center mx-2">
                <i class="fas fa-sign-in-alt mr-3 w-5"></i> Login Operator
            </a>
        </div>

    </div>
</header>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
