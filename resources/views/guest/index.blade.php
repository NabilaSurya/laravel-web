<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Daftar Kategori Aset | Argon Dashboard 2 Tailwind</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-0 rounded-xl">
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <h6 class="mb-0 font-bold text-white capitalize">Daftar Kategori Aset</h6>
                </nav>
            </div>
        </nav>

        <div class="w-full px-6 py-6 mx-auto">

            {{-- Pesan Sukses --}}
            @if (session('success'))
                <div class="p-4 mb-4 text-white bg-green-500 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                        {{-- JUDUL DAN TOMBOL TAMBAH --}}
                        <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl">
                            <div class="flex items-center justify-between">
                                <h6 class="text-xl font-semibold dark:text-white">Tabel Kategori Aset</h6>
                                <a href="{{ route('kategori_aset.create') }}"
                                    class="inline-block px-4 py-2 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 border-0 rounded-lg shadow-md ease-in hover:-translate-y-px text-xs leading-tight">TAMBAH
                                    KATEGORI
                                </a>
                            </div>
                        </div>

                        {{-- AREA TABEL --}}
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table
                                    class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 pl-4 font-bold text-left uppercase text-xxs border-b border-gray-200 border-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 w-10">
                                                ID</th>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase text-xxs border-b border-gray-200 border-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Nama Kategori</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase text-xxs border-b border-gray-200 border-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Kode</th>
                                            <th
                                                class="px-6 py-3 font-bold uppercase text-xxs border-b border-gray-200 border-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Deskripsi</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase text-xxs border-b border-gray-200 border-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($kategoriAsets as $kategori)
                                            <tr class="hover:bg-gray-100 transition-colors duration-150">
                                                <td
                                                    class="p-4 align-middle bg-transparent border-b border-gray-100 dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <p
                                                        class="mb-0 text-sm font-semibold leading-normal dark:text-white dark:opacity-80 pl-2">
                                                        {{ $kategori->kategori_id }}</p>
                                                </td>
                                                <td
                                                    class="p-4 align-middle bg-transparent border-b border-gray-100 dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <div class="flex px-2 py-1">
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                                {{ $kategori->nama }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="p-4 text-center align-middle bg-transparent border-b border-gray-100 dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-normal dark:text-white dark:opacity-80">
                                                        {{ $kategori->kode }}</p>
                                                </td>
                                                <td
                                                    class="p-4 align-middle bg-transparent border-b border-gray-100 dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-normal dark:text-white dark:opacity-80">
                                                        {{ $kategori->deskripsi }}</p>
                                                </td>
                                                <td
                                                    class="p-4 align-middle bg-transparent border-b border-gray-100 dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                    {{-- Kode sebelumnya di dalam <td> Aksi --}}
                                                    <div class="flex justify-center items-center space-x-3">
                                                        <a href="{{ route('kategori_aset.edit', $kategori->kategori_id) }}"
                                                            class="text-xs font-semibold leading-tight text-blue-500 hover:text-blue-700 transition-colors">
                                                            Edit </a>
                                                        <form method="POST"
                                                            action="{{ route('kategori_aset.destroy', $kategori->kategori_id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-xs font-semibold leading-tight text-red-500 hover:text-red-700 transition-colors"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                                Hapus </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($kategoriAsets->isEmpty())
                                            <tr>
                                                <td colspan="5"
                                                    class="p-4 text-center text-sm text-slate-500 bg-transparent border-b dark:border-white/40">
                                                    Belum ada data Kategori Aset. Silakan tambahkan data baru.
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
    </main>

    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
