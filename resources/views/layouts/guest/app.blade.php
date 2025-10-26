<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
    <title>Input Kategori Aset | Dashboard Guest</title>
    <!-- START CSS -->
    @include('layouts.guest.css')
    <!--END CSS-->
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    <!--START SIDEBAR -->
    @include('layouts.guest.sidebar')
    <!--END SIDEBAR -->
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- START HEADER -->
        @include('layouts.guest.header')
        <!--END HEADER -->
        <!-- MAIN CONTENT -->
        @yield('content')
        <!--END MAINCONTENT -->
        <!-- START FOOTER -->
        @include('layouts.guest.footer')
        <!-- END FOOTER -->

    </main>
    <!-- START JS -->
    @include('layouts.guest.js')
    <!-- END JS -->
</body>

</html>
