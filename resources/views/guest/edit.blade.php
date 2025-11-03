@extends('layouts.guest.app')

@section('content')

<div class="w-full px-6 py-6 mx-auto">
<h1 class="mb-6 text-2xl font-bold text-slate-700">Edit Kategori Aset</h1>

<div class="flex flex-wrap -mx-3 justify-center">
    <div class="w-full max-w-full px-3 lg:w-10/12 xl:w-8/12">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-6">
                <p class="leading-normal uppercase dark:opacity-60 text-sm">Informasi Kategori</p>
                <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white/40 dark:to-transparent" />

                <!-- Formulir Edit -->
                <form action="{{ route('kategori_aset.update', $kategoriAset) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap -mx-3">

                        {{-- Field Nama Kategori --}}
                        <div class="w-full max-w-full px-3 flex-0">
                            <div class="mb-4">
                                <label for="nama" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Nama Kategori</label>
                                <input type="text" name="nama" id="nama"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:ring-0"
                                    value="{{ old('nama', $kategoriAset->nama) }}" required />
                                @error('nama')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Field Kode Kategori --}}
                        <div class="w-full max-w-full px-3 flex-0">
                            <div class="mb-4">
                                <label for="kode" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Kode Kategori</label>
                                <input type="text" name="kode" id="kode"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:ring-0"
                                    value="{{ old('kode', $kategoriAset->kode) }}" required maxlength="10" />
                                @error('kode')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Field Deskripsi --}}
                        <div class="w-full max-w-full px-3 flex-0">
                            <div class="mb-4">
                                <label for="deskripsi" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:ring-0"
                                    rows="4">{{ old('deskripsi', $kategoriAset->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-normal text-xs ease-in tracking-tight-2 shadow-md bg-150 bg-x-25 hover:-translate-y-px hover:shadow-lg">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('kategori_aset.index') }}"
                            class="inline-block px-6 py-3 font-bold text-center text-slate-700 uppercase align-middle transition-all rounded-lg cursor-pointer bg-transparent border border-gray-300 leading-normal text-xs ease-in tracking-tight-2 hover:shadow-lg dark:text-white/80 dark:border-white/40">
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
