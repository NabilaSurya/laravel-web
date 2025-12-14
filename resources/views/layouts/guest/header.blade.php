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

            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.outside="open = false"
                    class="text-gray-600 hover:text-blue-700 transition duration-300 flex items-center gap-1 font-medium">
                    <i class="fas fa-layer-group w-4 text-blue-600"></i>
                    Menu Umum
                    <i class="fas fa-chevron-down text-xs ml-1"></i>
                </button>

                <div x-show="open" x-transition x-cloak
                    class="absolute top-full mt-2 w-48 bg-white border border-gray-100 shadow-lg rounded-lg py-2 z-50">

                    <a href="{{ route('kategori_aset.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                        <i class="fas fa-tags mr-2 text-blue-600"></i> Kategori Aset
                    </a>

                    <a href="{{ route('aset.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                        <i class="fas fa-boxes-stacked mr-2 text-blue-600"></i> Data Aset
                    </a>
                </div>
            </div>

            <a href="{{ route('warga.index') }}"
                class="text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-1">
                <i class="fas fa-users"></i> Warga
            </a>

            <div class="relative" x-data="{ openInfo: false }">
                <button @click="openInfo = !openInfo" @click.outside="openInfo = false"
                    class="text-gray-600 hover:text-blue-700 transition duration-300 flex items-center gap-1 font-medium">
                    <i class="fas fa-circle-info w-4 text-blue-600"></i>
                    Informasi
                    <i class="fas fa-chevron-down text-xs ml-1"></i>
                </button>

                <div x-show="openInfo" x-transition x-cloak
                    class="absolute top-full mt-2 w-48 bg-white border border-gray-100 shadow-lg rounded-lg py-2 z-50">

                    <a href="{{ route('about') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                        <i class="fas fa-info-circle mr-2 text-blue-600"></i> Tentang Aplikasi
                    </a>

                    <a href="{{ route('pengembang') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                        <i class="fas fa-user-gear mr-2 text-blue-600"></i> Profil Pengembang
                    </a>
                </div>
            </div>


            <div class="relative" x-data="{ openAuth: false }">
                <button @click="openAuth = !openAuth" @click.outside="openAuth = false"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 shadow-md text-sm font-semibold flex items-center gap-2">
                    <i class="fas fa-user-circle"></i>
                    Login Operator
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>

                <div x-show="openAuth" x-transition x-cloak
                    class="absolute right-0 mt-2 w-40 bg-white border border-gray-100 shadow-lg rounded-lg py-2 z-50">

                    <a href="{{ route('user.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                        <i class="fas fa-right-to-bracket mr-2 text-blue-600"></i> User
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition">
                            <i class="fas fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

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

            <div x-data="{ openAset: false }" class="mx-2 my-1">
                <button @click="openAset = !openAset"
                    class="w-full flex justify-between items-center px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg font-medium">
                    <span>
                        <i class="fas fa-layer-group mr-3 w-5 text-blue-600"></i> Aset
                    </span>
                    <i class="fas fa-chevron-down text-sm"></i>
                </button>

                <div x-show="openAset" x-transition x-cloak class="pl-6">
                    <a
                        href="{{ route('kategori_aset.index') }}"class="block px-4 py-2 text-gray-700 hover:text-blue-600 transition">
                        <i class="fas fa-tags mr-2"></i> Kategori Aset
                    </a>

                    <a href="{{ route('aset.index') }}"
                        class="block px-4 py-2 text-gray-700 hover:text-blue-600 transition">
                        <i class="fas fa-boxes-stacked mr-2"></i> Data Aset
                    </a>
                </div>
            </div>

            <a href="{{ route('warga.index') }}"
                class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg mx-2 my-1 font-medium">
                <i class="fas fa-users mr-3 w-5 text-blue-600"></i> Warga
            </a>

            <div x-data="{ openInfo: false }" class="mx-2 my-1">
                <button @click="openInfo = !openInfo"
                    class="w-full flex justify-between items-center px-4 py-3 text-gray-800 hover:bg-blue-50 transition rounded-lg font-medium">
                    <span>
                        <i class="fas fa-circle-info mr-3 w-5 text-blue-600"></i> Informasi
                    </span>
                    <i class="fas fa-chevron-down text-sm"></i>
                </button>

                <div x-show="openInfo" x-transition x-cloak class="pl-6">
                    <a href="{{ route('about') }}"
                        class="block px-4 py-2 text-gray-700 hover:text-blue-600 transition">
                        <i class="fas fa-info-circle mr-2"></i> Tentang Aplikasi
                    </a>

                    <a href="{{ route('pengembang') }}"
                        class="block px-4 py-2 text-gray-700 hover:text-blue-600 transition">
                        <i class="fas fa-user-gear mr-2"></i> Profil Pengembang
                    </a>
                </div>
            </div>

            <div x-data="{ openAuthMobile: false }" class="mx-2 mt-2">
                <button @click="openAuthMobile = !openAuthMobile"
                    class="w-full px-4 py-3 bg-blue-600 text-white rounded-xl font-semibold flex justify-between items-center">
                    <span>
                        <i class="fas fa-user-circle mr-2"></i> Login Operator
                    </span>
                    <i class="fas fa-chevron-down text-sm"></i>
                </button>

                <div x-show="openAuthMobile" x-transition x-cloak
                    class="mt-2 bg-white rounded-xl shadow-md overflow-hidden">
                    <a href="{{ route('user.index') }}"
                        class="block px-4 py-3 text-gray-800 hover:bg-blue-50 transition">
                        <i class="fas fa-right-to-bracket mr-2 text-blue-600"></i>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-3 text-red-600 hover:bg-red-50 transition">
                            <i class="fas fa-right-from-bracket mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</header>

<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
