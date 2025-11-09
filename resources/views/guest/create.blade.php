@extends('layouts.guest.app')

@section('content')
    {{-- Menggunakan py-10 untuk jarak yang lebih lega dari atas --}}
    <div class="w-full px-6 py-10 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">
                {{-- CARD FORM: Border yang lebih halus (rounded-xl) dan shadow yang lebih baik (shadow-lg) --}}
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-xl bg-clip-border mt-8">
                    <div class="flex-auto p-8"> {{-- Padding card diperbesar menjadi p-8 --}}
                        <div class="flex justify-between items-center mb-6 border-b pb-4"> {{-- Tambah garis bawah pada header form --}}
                            <h5 class="text-2xl font-semibold dark:text-white text-gray-800">Form Input Kategori Aset</h5>
                            <a href="{{ route('kategori_aset.index') }}"
                                class="text-sm font-medium transition-all ease-nav-brand text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-200 flex items-center">
                                <i class="fa fa-list-alt mr-1"></i>
                                <span class="hidden sm:inline">Daftar Kategori Aset</span>
                            </a>
                        </div>


                        <form action="{{ route('kategori_aset.store') }}" method="POST">
                            @csrf

                            {{-- INPUT FIELD: Penambahan shadow-sm, focus-ring, dan border-blue-500 saat focus --}}
                            <div class="mb-5">
                                <label for="nama"
                                    class="block mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">Nama
                                    Kategori</label>
                                <input type="text" name="nama" id="nama"
                                    class="text-sm shadow-sm transition-all duration-300 ease-in-out w-full leading-5.6 block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 bg-white bg-clip-padding py-2.5 px-4 text-gray-700 dark:text-gray-300 placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                    placeholder="Contoh: Peralatan Kantor" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label for="kode"
                                    class="block mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">Kode
                                    (Unique)</label>
                                <input type="text" name="kode" id="kode"
                                    class="text-sm shadow-sm transition-all duration-300 ease-in-out w-full leading-5.6 block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 bg-white bg-clip-padding py-2.5 px-4 text-gray-700 dark:text-gray-300 placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                    placeholder="Contoh: PK" value="{{ old('kode') }}" required>
                                @error('kode')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-8"> {{-- Margin bawah diperbesar --}}
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-semibold text-slate-700 dark:text-slate-300">Deskripsi
                                    (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3"
                                    class="text-sm shadow-sm transition-all duration-300 ease-in-out w-full leading-5.6 block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 bg-white bg-clip-padding py-2.5 px-4 text-gray-700 dark:text-gray-300 placeholder:text-gray-500 dark:placeholder:text-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100"
                                    placeholder="Penjelasan singkat tentang kategori aset...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end pt-4 border-t"> {{-- Tambah garis atas untuk memisahkan tombol --}}
                                {{-- Tombol Simpan: Efek hover yang lebih menarik (shadow-xl dan scale) --}}
                                <button type="submit"
                                    class="inline-block px-8 py-2 mr-3 text-sm font-bold leading-normal text-center text-white capitalize transition-all duration-300 ease-in-out rounded-lg shadow-md bg-blue-600 hover:bg-blue-700 hover:shadow-xl transform hover:scale-[1.02]">
                                    Simpan Kategori
                                </button>
                                {{-- Tombol Batal: Border yang lebih jelas dan efek hover yang halus --}}
                                <a href="{{ route('kategori_aset.index') }}"
                                    class="inline-block px-8 py-2 text-sm font-bold leading-normal text-center text-gray-700 dark:text-gray-300 capitalize transition-all duration-300 ease-in-out rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-slate-700 hover:bg-gray-100 dark:hover:bg-slate-600 hover:shadow-md">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
