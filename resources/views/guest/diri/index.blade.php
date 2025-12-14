@extends('layouts.guest.app')

@section('title', 'Profil Pengembang')

@section('content')
    <div class="w-full px-6 py-12 mx-auto">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-8 text-center">
                <img src="{{ asset('assets/img/pengembang.jpg') }}" alt="Foto Pengembang"
                    class="w-32 h-32 rounded-full mx-auto border-4 border-white shadow-lg object-cover mb-4">

                <h2 class="text-2xl font-bold">{{ $data['nama'] }}</h2>
                <p class="text-sm opacity-90 mt-1">Mahasiswa / Pengembang Aplikasi</p>
            </div>

            {{-- BODY --}}
            <div class="p-8 space-y-6">

                {{-- IDENTITAS --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-gray-700">

                    <div class="flex items-center gap-3">
                        <i class="fas fa-id-card text-blue-600 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">NIM</p>
                            <p class="font-semibold">{{ $data['nim'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Program Studi</p>
                            <p class="font-semibold">{{ $data['prodi'] ?? 'Sistem Informasi' }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Kelas</p>
                            <p class="font-semibold">{{ $data['kelas'] }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <i class="fas fa-laptop-code text-blue-600 text-xl"></i>
                        <div>
                            <p class="text-sm text-gray-500">Peran</p>
                            <p class="font-semibold">Frontend & Backend Developer</p>
                        </div>
                    </div>

                </div>

                {{-- DESKRIPSI --}}
                <div class="bg-blue-50 border border-blue-100 rounded-xl p-5 text-gray-700">
                    <p class="leading-relaxed text-sm">
                        Halaman ini menampilkan identitas pengembang aplikasi <strong>Portal Aset Publik</strong>.
                        Aplikasi ini dikembangkan sebagai bagian dari tugas akademik dengan tujuan membantu
                        pengelolaan data aset dan warga secara terstruktur, modern, dan mudah digunakan.
                    </p>
                </div>

                {{-- SOSIAL MEDIA --}}
                <div class="text-center">
                    <p class="text-sm text-gray-500 mb-4">Temui saya di media sosial</p>

                    <div class="flex justify-center gap-6 text-2xl">
                        <a href=https://www.linkedin.com/in/nabila-surya-ramadhani-580565360/ target="_blank"
                            class="text-blue-600 hover:text-blue-800 transition">
                            <i class="fab fa-linkedin"></i>
                        </a>

                        <a href="https://github.com/Nabilasurya" target="_blank"
                            class="text-gray-800 hover:text-black transition">
                            <i class="fab fa-github"></i>
                        </a>

                        <a href="https://instagram.com/nbilasurya" target="_blank"
                            class="text-pink-600 hover:text-pink-800 transition">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="mailto:surya24si@mahasiswa.pcr.ac.id"class="text-red-600 hover:text-red-800 transition">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                {{-- BUTTON --}}
                <div class="text-center pt-4">
                    <a href="/"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
