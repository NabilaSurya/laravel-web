<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Daftar Kategori Aset | Dashboard Guest</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    <!-- HEADER BIRU -->
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <!-- SIDEBAR -->
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-transform duration-200 -translate-x-full bg-white shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-19">
            <a class="block px-8 py-6 text-sm whitespace-nowrap text-slate-700" href="javascript:;">
                <img src="{{ asset('assets/img/logo-ct-dark.png') }}"
                    class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                    alt="main_logo" />
                <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Dashboard Guest</span>
            </a>
        </div>
        <hr class="h-px mt-0 bg-gradient-to-r from-transparent via-black/40 to-transparent" />
        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">

                <li class="mt-0.5 w-full">
                    <a href="javascript:;"
                        class="py-2.7 flex items-center mx-2 px-4 font-semibold text-slate-700 text-sm rounded-lg transition-colors">
                        <i class="ni ni-tv-2 text-blue-500 text-sm mr-2"></i>
                        Dashboard
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a href="{{ route('kategori_aset.create') }}"
                        class="py-2.7 flex items-center mx-2 px-4 font-semibold text-slate-700 text-sm rounded-lg transition-colors">
                        <i class="ni ni-collection text-blue-500 text-sm mr-2"></i>
                        Input Kategori Aset
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a href="javascript:;"
                        class="py-2.7 flex items-center mx-2 px-4 font-semibold text-white text-sm rounded-lg bg-gradient-to-tl from-blue-500 to-violet-500 transition-colors">
                        <i class="ni ni-calendar-grid-58 text-white text-sm mr-2"></i>
                        Tables
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 z-10 rounded-xl">

        <!-- NAVBAR -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <h6 class="mb-0 font-bold text-white capitalize">Pages / Daftar Kategori Aset</h6>
                <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="flex items-center">
                        <a href="javascript:;" class="block px-0 py-2 text-sm font-semibold text-white">
                            <i class="fa fa-user sm:mr-1"></i>
                            <span class="hidden sm:inline">User Name</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- PAGE CONTENT -->
        <div class="w-full px-6 py-6 mx-auto">

            @if (session('success'))
                <div class="p-4 mb-4 text-white bg-green-500 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                        <!-- HEADER TABEL -->
                        <div class="p-6 pb-0 mb-0 border-b rounded-t-2xl">
                            <div class="flex justify-between items-center">
                                <h6 class="text-lg font-semibold">Tabel Kategori Aset</h6>
                                <a href="{{ route('kategori_aset.create') }}"
                                    class="px-4 py-2 text-xs font-bold text-white uppercase bg-blue-500 rounded-lg shadow-md hover:-translate-y-px transition-all">Tambah
                                    Kategori</a>
                            </div>
                        </div>

                        <!-- TABEL -->
                        <div class="flex-auto p-6">
                            <div class="overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-bold uppercase text-slate-400">
                                                ID</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold uppercase text-slate-400">
                                                Nama Kategori</th>
                                            <th
                                                class="px-6 py-3 text-center text-xs font-bold uppercase text-slate-400">
                                                Kode</th>
                                            <th class="px-6 py-3 text-left text-xs font-bold uppercase text-slate-400">
                                                Deskripsi</th>
                                            <th
                                                class="px-6 py-3 text-center text-xs font-bold uppercase text-slate-400">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kategoriAsets as $kategori)
                                            <tr class="hover:bg-gray-50 transition-colors">
                                                <td class="px-6 py-3 text-sm font-semibold">{{ $kategori->kategori_id }}
                                                </td>
                                                <td class="px-6 py-3">
                                                    <div class="flex items-center">
                                                        <div class="flex flex-col justify-center">
                                                            <h6 class="mb-0 text-sm font-semibold">
                                                                {{ $kategori->nama }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-center text-sm font-semibold">
                                                    {{ $kategori->kode }}</td>
                                                <td class="px-6 py-3 text-sm">{{ $kategori->deskripsi }}</td>
                                                <td class="px-6 py-3 text-center">
                                                    <div class="flex justify-center items-center space-x-3">
                                                        <a href="{{ route('kategori_aset.edit', $kategori->kategori_id) }}"
                                                            class="text-xs font-semibold text-blue-600 hover:text-blue-800">Edit</a>
                                                        <form
                                                            action="{{ route('kategori_aset.destroy', $kategori->kategori_id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin hapus kategori ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="text-xs font-semibold text-red-600 hover:text-red-800">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="px-6 py-4 text-center text-sm text-slate-500">
                                                    Belum ada data Kategori Aset.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 justify-between">
                        <div class="w-full max-w-full px-3 text-center text-sm text-slate-500">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart text-red-500"></i> by Your Company.
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </main>

    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
