<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>@yield('title', 'Dashboard Guest')</title>

    @include('layouts.guest.css')
    </head>

{{-- PERUBAHAN KRUSIAL DI BAWAH --}}
{{-- Ubah kelas body agar memiliki background putih polos --}}
<body
    class="m-0 font-sans text-base antialiased font-normal  leading-default bg-white text-slate-500">

    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div> 


        @include('layouts.guest.header')
        @yield('content')
        @include('layouts.guest.footer')
        </main>

    @include('layouts.guest.js')
    </body>
</html>
