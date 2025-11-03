<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Aplikasi</title>
    {{-- Asumsi Anda memiliki CSS layout yang sama dengan yang lain --}}
    @include('layouts.guest.css')
    {{-- MENGGANTI KIT DENGAN CDN STANDARD UNTUK MEMASTIKAN IKON BRANDS (FAB) TERSEDIA --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" xintegrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .module-card {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .module-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .decorative-icon {
            opacity: 0.1;
            font-size: 5rem;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* Styling untuk Floating Action Button */
        .fab-whatsapp {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #25d366; /* Warna hijau WhatsApp */
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .fab-whatsapp:hover {
            background-color: #128c7e;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .fab-whatsapp i {
            font-size: 28px;
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @include('layouts.guest.header')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        {{-- Navbar --}}
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start bg-transparent"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-slate-500" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-slate-500 before:content-['/']"
                            aria-current="page">Tentang Aplikasi</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-slate-700 capitalize">Tentang Aplikasi Aset & Warga</h6>
                </nav>
            </div>
        </nav>
        {{-- End Navbar --}}

        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3">
                    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border p-8">

                        <div class="text-center mb-10">
                            {{-- Ikon Tools menggunakan 'fas' (Solid) --}}
                            <i class="fas fa-tools text-5xl text-blue-500 mb-3"></i>
                            <h1 class="text-2xl font-extrabold mb-2 text-slate-800">Sistem Informasi Aset & Warga</h1>
                            <p class="text-sm leading-relaxed text-slate-600 max-w-3xl mx-auto">
                                Aplikasi ini dirancang untuk mempermudah pengelolaan data inventaris aset dan pendataan informasi dasar warga di lingkungan Anda. Kami memastikan data tersimpan dengan rapi, aman, dan mudah diakses.
                            </p>
                        </div>

                        <!-- MODUL UTAMA SECTION -->
                        <h2 class="text-xl font-bold mb-6 text-slate-800 border-b pb-2 border-slate-100">Modul Utama & Tujuan</h2>
                        <div class="flex flex-wrap -mx-3 mb-8">

                            <!-- Card Modul 1: Kategori Aset -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-purple-500 shadow-md">
                                    <i class="fas fa-tags text-2xl mb-3 text-purple-500"></i>
                                    <h3 class="font-bold text-lg mb-2">1. Manajemen Kategori Aset</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Modul ini berfungsi sebagai dasar klasifikasi. Tujuannya adalah mengelompokkan aset berdasarkan jenis (misalnya: Meja, Kendaraan, Elektronik) untuk memudahkan pengorganisasian dan pembuatan laporan spesifik.
                                    </p>
                                    <i class="fas fa-layer-group decorative-icon text-purple-200"></i>
                                </div>
                            </div>

                            <!-- Card Modul 2: Aset (Tables) -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-blue-500 shadow-md">
                                    <i class="fas fa-boxes text-2xl mb-3 text-blue-500"></i>
                                    <h3 class="font-bold text-lg mb-2">2. Pendataan Inventaris Aset</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Ini adalah modul inti untuk melihat, menambah, dan mengelola semua aset. Data yang dicatat meliputi kondisi, kode unik, ID, dan deskripsi. Memastikan pemantauan barang inventaris yang akurat.
                                    </p>
                                    <i class="fas fa-clipboard-list decorative-icon text-blue-200"></i>
                                </div>
                            </div>

                            <!-- Card Modul 3: Warga -->
                            <div class="w-full lg:w-1/3 max-w-full px-3 mb-6">
                                <div class="module-card bg-white p-6 rounded-xl text-slate-700 border-t-4 border-green-500 shadow-md">
                                    <i class="fas fa-users text-2xl mb-3 text-green-500"></i>
                                    <h3 class="font-bold text-lg mb-2">3. Pendataan Data Warga</h3>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Modul administratif untuk mencatat data pokok penduduk atau anggota komunitas. Informasi seperti NIK, nama, kontak, dan alamat sangat penting untuk kebutuhan administrasi internal.
                                    </p>
                                    <i class="fas fa-id-card decorative-icon text-green-200"></i>
                                </div>
                            </div>
                        </div>

                        <!-- ALUR SECTION -->
                        <h2 class="text-xl font-bold mb-4 text-slate-800 border-b pb-2 border-slate-100">Alur Kerja Sistem (Data Aset)</h2>
                        <div class="relative mb-8 p-6 bg-gray-50 rounded-xl shadow-inner">
                            <div class="flex items-start mb-4">
                                <span class="bg-blue-500 text-white rounded-full h-8 w-8 flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">1</span>
                                <div>
                                    <p class="font-semibold text-slate-700">Input Kategori Dasar</p>
                                    <p class="text-sm text-slate-600">Pengguna memulai dengan mendefinisikan kategori (Contoh: "Peralatan Elektronik").</p>
                                </div>
                            </div>
                            <div class="flex items-start mb-4">
                                <span class="bg-blue-500 text-white rounded-full h-8 w-8 flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">2</span>
                                <div>
                                    <p class="font-semibold text-slate-700">Pendaftaran Aset Baru</p>
                                    <p class="text-sm text-slate-600">Setiap aset baru harus dikaitkan ke salah satu kategori yang telah dibuat sebelumnya.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <span class="bg-blue-500 text-white rounded-full h-8 w-8 flex items-center justify-center text-sm font-bold mr-3 flex-shrink-0">3</span>
                                <div>
                                    <p class="font-semibold text-slate-700">Pengelolaan & Pemeliharaan</p>
                                    <p class="text-sm text-slate-600">Data aset dapat dimodifikasi (Edit), diperbarui statusnya, atau dihapus jika aset tersebut sudah tidak ada.</p>
                                </div>
                            </div>
                            <i class="fas fa-long-arrow-alt-down text-3xl text-gray-300 absolute top-10 left-12 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-50" style="top: 2.8rem; left: 2.5rem;"></i>
                            <i class="fas fa-long-arrow-alt-down text-3xl text-gray-300 absolute top-10 left-12 transform -translate-x-1/2 -translate-y-1/2 pointer-events-none opacity-50" style="top: 7.3rem; left: 2.5rem;"></i>
                        </div>

                        <!-- FOOTER / CATATAN -->
                        <div class="mt-4 border-t border-slate-100 pt-4 text-center">
                             <p class="text-xs text-slate-400">
                                Dibangun dengan Laravel Framework | Hak Cipta &copy; 2025
                             </p>
                        </div>

                    </div>
                </div>
            </div>

            @include('layouts.guest.footer')
        </div>
    </main>

    <!-- FLOATING ACTION BUTTON WHATSAPP -->
    <a href="https://wa.me/6282184244159text=Halo%2C%20saya%20punya%20pertanyaan%20mengenai%20aplikasi%20Aset%20%26%20Warga." target="_blank" class="fab-whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @include('layouts.guest.js')
</body>

</html>
