<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto transition-transform duration-200 -translate-x-full bg-white shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">

    {{-- Header Sidebar --}}
    <div class="h-19">
        <a class="block px-8 py-6 text-sm whitespace-nowrap text-slate-700" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                alt="main_logo" />
            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Dashboard Guest</span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-gradient-to-r from-transparent via-black/40 to-transparent" />

    {{-- Menu Items --}}
    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

            {{-- Dashboard --}}
            <li class="mt-0.5 w-full">
                <a href="{{ route('dashboard') }}"
                    class="py-2.5 flex items-center mx-2 px-4 font-semibold text-sm rounded-lg
                    text-slate-700 transition-all duration-200 ease-in-out
                    hover:bg-blue-100 active:bg-blue-500 active:text-white">
                    <i class="ni ni-tv-2 text-sm mr-2 text-blue-500"></i>
                    Dashboard
                </a>
            </li>

            {{-- Input Kategori Aset --}}
            <li class="mt-0.5 w-full">
                <a href="{{ route('kategori_aset.create') }}"
                    class="py-2.5 flex items-center mx-2 px-4 font-semibold text-sm rounded-lg
                    text-slate-700 transition-all duration-200 ease-in-out
                    hover:bg-blue-100 active:bg-blue-500 active:text-white">
                    <i class="ni ni-collection text-sm mr-2 text-blue-500"></i>
                    Input Kategori Aset
                </a>
            </li>

            {{-- Tables --}}
            <li class="mt-0.5 w-full">
                <a href="{{ route('kategori_aset.index') }}"
                    class="py-2.5 flex items-center mx-2 px-4 font-semibold text-sm rounded-lg
                    text-slate-700 transition-all duration-200 ease-in-out
                    hover:bg-blue-100 active:bg-blue-500 active:text-white">
                    <i class="ni ni-calendar-grid-58 text-sm mr-2 text-blue-500"></i>
                    Tables
                </a>
            </li>

            <li class="mt-0.5 w-full">
                <a href="{{ route('warga.index') }}"
                    class="py-2.5 flex items-center mx-2 px-4 font-semibold text-sm
                    rounded-lg text-slate-700 transition-all duration-200 ease-in-out
                    hover:bg-blue-100 active:bg-blue-500 active:text-white">
                    <i class="ni ni-circle-08 text-sm mr-2 text-blue-500"></i>
                    Warga
                </a>
            </li>


        </ul>
    </div>
</aside>
