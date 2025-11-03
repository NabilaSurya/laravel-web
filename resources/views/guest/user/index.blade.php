@extends('layouts.guest.app')

@section('content')
    <!-- KONTEN UTAMA -->
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">

                <!-- Header Halaman -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar User</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Kelola semua akun pengguna di sini.</p>
                </div>

                <!-- Bagian Notifikasi -->
                @if (session('success'))
                    <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded-lg dark:bg-green-900 dark:text-green-300"
                        role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Tombol Tambah User -->
                <div class="mb-4 flex justify-end">
                    <a href="{{ route('user.create') }}"
                        class="inline-block px-4 py-2 text-sm font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg">
                        <i class="fa fa-plus-circle mr-1"></i> Tambah User
                    </a>
                </div>

                <!-- Card untuk Tabel -->
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead class="bg-gray-100 dark:bg-slate-700 rounded-lg">
                                    <tr>
                                        <th
                                            class="py-3 px-4 text-sm font-semibold text-left text-slate-700 uppercase rounded-tl-lg">
                                            No</th>
                                        <th
                                            class="py-3 px-4 text-sm font-semibold text-left text-slate-700 uppercase">
                                            Nama</th>
                                        <th
                                            class="py-3 px-4 text-sm font-semibold text-left text-slate-700 uppercase">
                                            Email</th>
                                        <th
                                            class="py-3 px-4 text-sm font-semibold text-center text-slate-700 uppercase rounded-tr-lg">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr
                                            class="border-t border-gray-200 dark:border-slate-700 hover:bg-gray-50 dark:hover:bg-slate-750 transition-colors duration-150">
                                            <td class="py-3 px-4 text-sm text-slate-600 dark:text-gray-300">
                                                {{ $index + 1 }}</td>
                                            <td class="py-3 px-4 text-sm text-slate-700 dark:text-white font-medium">
                                                {{ $user->name }}</td>
                                            <td class="py-3 px-4 text-sm text-slate-600 dark:text-gray-300">
                                                {{ $user->email }}</td>

                                            <!-- Kolom Aksi -->
                                            <td class="py-3 px-4 text-center text-sm">
                                                <div class="flex justify-center items-center space-x-3">

                                                    <!-- Tombol Edit (Biru) --><a href="{{ route('user.edit', $user->id) }}"
                                                        class="inline-flex items-center px-4 py-1.5 text-xs font-semibold text-white bg-blue-500 rounded-lg shadow-sm hover:bg-blue-600 hover:shadow-md transition duration-150 ease-in-out">
                                                        <i class="fa fa-edit mr-1"></i> Edit
                                                    </a>

                                                    <!-- Tombol Hapus (Merah - Disesuaikan dengan !important) -->
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                        class="inline-block"
                                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-1.5 text-xs font-semibold !text-white !bg-red-600 rounded-lg shadow-sm hover:!bg-red-700 hover:shadow-md transition duration-150 ease-in-out">
                                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if ($users->isEmpty())
                                        <tr>
                                            <td colspan="4"
                                                class="py-5 text-center text-base text-gray-500 dark:text-gray-400">
                                                Belum ada data user.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- AKHIR KONTEN UTAMA -->
@endsection
