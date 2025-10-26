@extends('layouts.guest.app')

@section('content')
    <!-- MAIN CONTENT -->
    <div class="w-full px-6 py-6 mx-auto">

        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="font-bold dark:text-white">Form Input Kategori Aset</h5>
                            <a href="{{ route('kategori_aset.index') }}"
                                class="text-sm font-semibold transition-all ease-nav-brand text-blue-500 hover:text-blue-700 dark:text-white dark:hover:text-gray-300">
                                <i class="fa fa-list-alt sm:mr-1"></i>
                                <span class="sm:inline">Daftar Kategori Aset</span>
                            </a>
                        </div>


                        <form action="{{ route('kategori_aset.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="nama"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama
                                    Kategori</label>
                                <input type="text" name="nama" id="nama"
                                    class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Contoh: Peralatan Kantor" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="kode"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kode
                                    (Unique)</label>
                                <input type="text" name="kode" id="kode"
                                    class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Contoh: PK" value="{{ old('kode') }}" required>
                                @error('kode')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Deskripsi
                                    (Opsional)</label>
                                <textarea name="deskripsi" id="deskripsi" rows="3"
                                    class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                    placeholder="Penjelasan singkat tentang kategori aset...">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="inline-block px-8 py-2 mr-2 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-blue-500 bg-150 hover:shadow-xs hover:-translate-y-px">
                                    Simpan Kategori
                                </button>
                                <a href="{{ route('kategori_aset.index') }}"
                                    class="inline-block px-8 py-2 text-xs font-bold leading-normal text-center text-slate-700 capitalize transition-all ease-in rounded-lg shadow-md bg-gray-200 bg-150 hover:shadow-xs hover:-translate-y-px">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END MAINCONTENT -->
@endsection
