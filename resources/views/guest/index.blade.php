<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Daftar Kategori Aset | Dashboard Guest</title>

    @include('layouts.guest.css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @include('layouts.guest.header')
    @include('layouts.guest.sidebar')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                        <li class="text-sm leading-normal">
                            <a class="text-white opacity-50" href="javascript:;">Pages</a>
                        </li>
                        <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
                            aria-current="page">Kategori Aset</li>
                    </ol>
                    <h6 class="mb-0 font-bold text-white capitalize">Daftar Kategori Aset</h6>
                </nav>

                <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
                    <div class="flex items-center md:ml-auto md:pr-4">
                        <!-- Space for search or other elements if needed -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="w-full px-6 py-6 mx-auto">
            <!-- Button Tambah Data -->
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full max-w-full px-3">
                    <a href="{{ route('kategori_aset.create') }}"
                        class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                        <i class="fas fa-plus mr-2"></i>Tambah Kategori Aset
                    </a>
                </div>
            </div>

            <!-- Cards Row -->
            <div class="flex flex-wrap -mx-3">
                @forelse ($kategoriAsets as $kategori)
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/3">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                {{ $kategori->nama }}
                                            </p>
                                            <h5 class="mb-2 font-bold dark:text-white">
                                                {{ $kategori->kode }}
                                            </h5>
                                            <p class="mb-0 dark:text-white dark:opacity-60">
                                                <span class="text-xs font-bold leading-normal text-emerald-500">ID:
                                                    {{ $kategori->kategori_id }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                            <i class="fas fa-folder-open text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-4">
                                    <p class="text-sm leading-normal text-slate-500 dark:text-white dark:opacity-60">
                                        {{ Str::limit($kategori->deskripsi, 80, '...') }}
                                    </p>
                                </div>

                                <div class="flex justify-end items-center pt-3 border-t border-slate-100">
                                    <a href="{{ route('kategori_aset.edit', $kategori->kategori_id) }}"
                                        class="inline-block px-4 py-2 mr-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 bg-gradient-to-tl from-slate-600 to-slate-300">
                                        <i class="fas fa-pencil-alt text-xs mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('kategori_aset.destroy', $kategori->kategori_id) }}"
                                        method="POST" class="inline-block"
                                        onsubmit="return confirm('Yakin hapus kategori {{ $kategori->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 py-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 bg-gradient-to-tl from-red-600 to-orange-400">
                                            <i class="fas fa-trash text-xs mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-6 text-center">
                                <div
                                    class="inline-block w-16 h-16 text-center rounded-circle bg-gradient-to-tl from-slate-600 to-slate-300 mb-4">
                                    <i class="fas fa-folder-open text-3xl relative top-4 text-white"></i>
                                </div>
                                <h5 class="mb-2 font-bold text-slate-700 dark:text-white">Belum Ada Data Kategori Aset
                                </h5>
                                <p class="mb-4 text-sm text-slate-500 dark:text-white dark:opacity-60">
                                    Silakan klik tombol "Tambah Kategori Aset" untuk menambahkan data baru.
                                </p>
                                <a href="{{ route('kategori_aset.create') }}"
                                    class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <i class="fas fa-plus mr-2"></i>Tambah Data Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            @include('layouts.guest.footer')
        </div>
    </main>

    @include('layouts.guest.js')
</body>

</html>
