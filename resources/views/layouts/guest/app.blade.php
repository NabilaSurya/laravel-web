<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard Guest')</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-KOd9xC5q+eQ8R50Hc3iB+Vx3Ktv+FZP9lGF7X3BpGH/9HuZCgL5c+zp8sZ0/If56oK/+jH9CEZwhEovQp6v0xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @include('layouts.guest.css')

    <style>
        /* Hero Background Overlay */
        .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.75), rgba(30, 64, 175, 0.75));
        }

        /* Konten offset untuk header */
        main {
            padding-top: 80px;
        }

        /* Pointer untuk card kategori */
        .category-card:hover {
            cursor: pointer;
        }

        /* FAB WhatsApp */
        .fab-whatsapp {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #25D366;
            /* Warna hijau WhatsApp */
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .fab-whatsapp:hover {
            transform: scale(1.1);
        }

        /* Card kategori opsional */
        .category-card {
            background-color: white;
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-white text-slate-500">

    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    @include('layouts.guest.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.guest.footer')

    @include('layouts.guest.js')

    <a href="https://wa.me/6282184244159?text=Halo%2C%20saya%20punya%20pertanyaan%20mengenai%20aplikasi%20Aset%20%26%20Warga."
        target="_blank" class="fab-whatsapp">
        <i class="fab fa-whatsapp"></i>
    </a>

</body>

</html>
