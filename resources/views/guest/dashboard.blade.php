<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- ASET HEAD --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Input Aset Baru | Warga Desa</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    {{-- CSS FILE PATHS (Diubah menggunakan asset()) --}}
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-0 rounded-xl">

        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            {{-- Route ke Beranda (Ganti 'guest.index' dengan route yang sesuai) --}}
                            <a class="text-slate-700 opacity-50 dark:text-white"
                                href="{{ route('guest.index') }}">Beranda</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 dark:text-white before:float-left before:pr-2 before:text-slate-700 before:content-['/']"
                            aria-current="page">Input Aset</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-slate-700 dark:text-white capitalize">Formulir Pendaftaran Aset Baru
                    </h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                        <li class="flex items-center">
                            {{-- Route ke Login Admin --}}
                            <a href="{{ route('login') }}"
                                class="block px-0 py-2 text-sm font-semibold text-slate-700 dark:text-white transition-all ease-nav-brand">
                                <i class="fa fa-lock sm:mr-1"></i>
                                <span class="hidden sm:inline">Login Admin</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="w-full px-6 py-6 mx-auto">

            {{-- BAGIAN PESAN SUKSES/ERROR --}}
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-bold">Sukses!</span> {{ session('success') }}
                </div>
            @endif

            {{-- Jika ada error validasi setelah redirect back --}}
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-bold">Gagal!</span> Mohon periksa kembali input Anda.
                </div>
            @endif

            {{-- BAGIAN UTAMA FORMULIR INPUT ASET --}}
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 mt-0 lg:w-full lg:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-padding">

                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                            <h6 class="dark:text-white">Isi Detail Aset Anda</h6>
                            <p class="text-sm dark:text-white dark:opacity-80">Pastikan data yang dimasukkan benar dan
                                sesuai.</p>
                        </div>

                        <div class="flex-auto p-6">
                            {{-- FORM POST KE CONTROLLER (Route 'aset.store' harus terdaftar) --}}
                            <form action="{{ route('aset.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="flex flex-wrap -mx-3">

                                    {{-- Kolom Kategori --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="kategori_id"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Kategori
                                                Aset</label>
                                            <select name="kategori_id" id="kategori_id"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('kategori_id') border-red-500 @enderror"
                                                required>
                                                <option value="">-- Pilih Kategori --</option>
                                                {{-- LOOP KATEGORI ASET DISINI (Pastikan $kategoris dikirim dari controller) --}}
                                                @isset($kategoris)
                                                    @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->kategori_id }}"
                                                            {{ old('kategori_id') == $kategori->kategori_id ? 'selected' : '' }}>
                                                            {{ $kategori->nama }} ({{ $kategori->kode }})</option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                            @error('kategori_id')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Kode Aset --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="kode_aset"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Kode
                                                Aset (Unik)</label>
                                            <input type="text" name="kode_aset" id="kode_aset"
                                                value="{{ old('kode_aset') }}"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('kode_aset') border-red-500 @enderror"
                                                required />
                                            @error('kode_aset')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Nama Aset --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="nama_aset"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama
                                                Aset</label>
                                            <input type="text" name="nama_aset" id="nama_aset"
                                                value="{{ old('nama_aset') }}"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('nama_aset') border-red-500 @enderror"
                                                required />
                                            @error('nama_aset')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Tanggal Perolehan --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="tgl_perolehan"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal
                                                Perolehan</label>
                                            <input type="date" name="tgl_perolehan" id="tgl_perolehan"
                                                value="{{ old('tgl_perolehan') }}"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('tgl_perolehan') border-red-500 @enderror"
                                                required />
                                            @error('tgl_perolehan')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Nilai Perolehan --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="nilai_perolehan"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nilai
                                                Perolehan (Rp)</label>
                                            <input type="number" name="nilai_perolehan" id="nilai_perolehan"
                                                value="{{ old('nilai_perolehan') }}" step="0.01"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('nilai_perolehan') border-red-500 @enderror"
                                                required />
                                            @error('nilai_perolehan')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Kondisi --}}
                                    <div class="w-full max-w-full px-3 shrink-0 md:w-1/2 md:flex-none">
                                        <div class="mb-4">
                                            <label for="kondisi"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Kondisi
                                                Aset</label>
                                            <select name="kondisi" id="kondisi"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('kondisi') border-red-500 @enderror"
                                                required>
                                                <option value="">-- Pilih Kondisi --</option>
                                                <option value="Baik"
                                                    {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                                <option value="Rusak Ringan"
                                                    {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak
                                                    Ringan</option>
                                                <option value="Rusak Berat"
                                                    {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat
                                                </option>
                                            </select>
                                            @error('kondisi')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Kolom Foto Aset --}}
                                    <div class="w-full max-w-full px-3 shrink-0 lg:w-full lg:flex-none">
                                        <div class="mb-4">
                                            <label for="foto_aset"
                                                class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Foto
                                                Aset (Opsional)</label>
                                            <input type="file" name="foto_aset" id="foto_aset"
                                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('foto_aset') border-red-500 @enderror" />
                                            @error('foto_aset')
                                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tombol Submit --}}
                                    <div class="w-full max-w-full px-3 mt-4 shrink-0 lg:w-full lg:flex-none">
                                        <button type="submit"
                                            class="inline-block w-full px-5 py-2.5 mt-3 mb-2 text-sm font-bold text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                            Simpan Aset Baru
                                        </button>
                                        <a href="{{ route('guest.index') }}"
                                            class="inline-block w-full px-5 py-2.5 mt-2 mb-2 text-sm font-bold text-center text-slate-700 dark:text-white align-middle transition-all ease-in bg-gray-200 border-0 rounded-lg shadow-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                            Batal
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER --}}
            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                ©
                                <script>
                                    document.write(new Date().getFullYear() + ",");
                                </script>
                                dibuat dengan <i class="fa fa-heart"></i> oleh
                                <a href="#" class="font-semibold text-slate-700 dark:text-white"
                                    target="_blank">Tim Desa</a>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                            <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                                <li class="nav-item">
                                    <a href="#"
                                        class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                        target="_blank">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                        target="_blank">Layanan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                        target="_blank">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-in-out text-slate-500"
                                        target="_blank">Lisensi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    {{-- SCRIPT JS FILE PATHS (Diubah menggunakan asset()) --}}
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
