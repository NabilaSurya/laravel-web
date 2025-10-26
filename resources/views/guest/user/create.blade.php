@extends('layouts.guest.app')

@section('content')
    <!-- KONTEN UTAMA -->
    <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="font-bold dark:text-white">Form Input User</h5>
                            <!-- Link ke Daftar User -->
                            <a href="{{ route('user.index') }}"
                                class="text-sm font-semibold transition-all ease-nav-brand text-blue-500 hover:text-blue-700 dark:text-white dark:hover:text-gray-300">
                                <i class="fa fa-list-alt sm:mr-1"></i>
                                <span class="sm:inline">Daftar User</span>
                            </a>
                        </div>

                        <!-- Form Store User -->
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <!-- Nama Lengkap -->
                            <div class="mb-4">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Contoh: Nabila Putri" required>
                                @error('name')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Contoh: nabila@example.com" required>
                                @error('email')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password Fields (Menggunakan Grid/Row untuk tampilan 2 kolom) -->
                            <div class="flex flex-wrap -mx-3">
                                <!-- Password -->
                                <div class="w-full md:w-1/2 px-3 mb-4">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Masukkan password" required>
                                    @error('password')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="w-full md:w-1/2 px-3 mb-4">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Konfirmasi
                                        Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Ulangi password" required>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex justify-end mt-6">
                                <a href="{{ route('user.index') }}"
                                    class="inline-block px-8 py-2 mr-2 text-xs font-bold leading-normal text-center text-slate-700 capitalize transition-all ease-in rounded-lg shadow-md bg-gray-200 bg-150 hover:shadow-xs hover:-translate-y-px">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="inline-block px-8 py-2 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-blue-500 bg-150 hover:shadow-xs hover:-translate-y-px">
                                    Simpan User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--AKHIR KONTEN UTAMA -->
@endsection
