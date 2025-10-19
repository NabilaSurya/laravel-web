<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Input Kategori Aset | Argon Dashboard 2 Tailwind</title>

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

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start"
            navbar-main navbar-scroll="false">
            <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
                <nav>
                    <h6 class="mb-0 font-bold text-white capitalize">Input Kategori Aset</h6>
                </nav>

                <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                    <li class="flex items-center px-4">
                        <a href="{{ route('kategori_aset.index') }}"
                            class="block text-sm font-semibold transition-all ease-nav-brand text-white hover:text-gray-300">
                            <i class="fa fa-list-alt sm:mr-1"></i>
                            <span class="hidden sm:inline">Daftar Kategori Aset</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="w-full px-6 py-6 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 sm:flex-none">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-6">
                            <h5 class="mb-4 font-bold dark:text-white">Form Input Kategori
                                Aset</h5>

                            <form action="{{ route('kategori_aset.store') }}" method="POST">
                                @csrf

                                <div class="mb-4">
                                    <label for="nama"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Nama
                                        Kategori</label>
                                    <input type="text" name="nama" id="nama"
                                        class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Contoh: Peralatan Kantor" value="{{ old('nama') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="kode"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Kode
                                        (Unique)</label>
                                    <input type="text" name="kode" id="kode"
                                        class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                        placeholder="Contoh: PK" value="{{ old('kode') }}" required>
                                </div>

                                <div class="mb-6">
                                    <label for="deskripsi"
                                        class="block mb-2 text-sm font-medium text-slate-700 dark:text-white">Deskripsi
                                        (Opsional)</label>

                                    <textarea name="deskripsi" id="deskripsi" rows="3"                                        
                                        class="text-sm focus:shadow-primary-outline ease w-full leading-5.6 relative block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 px-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow"
                                                                                placeholder="Penjelasan singkat tentang kategori aset...">{{ old('deskripsi') }}</textarea>

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

    </main>


    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>

    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</body>

</html>
