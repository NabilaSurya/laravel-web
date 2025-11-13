<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* =======================
   Hero Background Overlay
   ======================= */
        .hero-bg {
            /* Linear gradient overlay biru gelap */
            background-image: linear-gradient(rgba(17, 24, 39, 0.75), rgba(30, 64, 175, 0.75));
        }

        /* =======================
   Konten offset karena header fixed
   ======================= */
        main {
            padding-top: 80px;
            /* Sesuaikan dengan tinggi header */
        }

        /* =======================
   Pointer untuk kartu kategori
   ======================= */
        .category-card:hover {
            cursor: pointer;
        }

        /* FAB WhatsApp */
        .fab-whatsapp {
            position: fixed;
            /* Membuat elemen melayang relatif terhadap viewport */
            bottom: 20px;
            /* Jarak dari bawah */
            right: 20px;
            /* Jarak dari kanan */
            width: 50px;
            /* Lebar lingkaran */
            height: 50px;
            /* Tinggi lingkaran */
            background-color: #25D366;
            /* Warna hijau WhatsApp */
            color: white;
            /* Warna ikon di dalamnya (putih) */
            border-radius: 50%;
            /* Membuat bentuk lingkaran sempurna */
            display: flex;
            /* Memungkinkan penempatan ikon di tengah */
            align-items: center;
            /* Pusatkan ikon secara vertikal */
            justify-content: center;
            /* Pusatkan ikon secara horizontal */
            font-size: 24px;
            /* Ukuran ikon */
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
            /* Efek bayangan */
            z-index: 1000;
            /* Memastikan FAB muncul di atas konten lain */
            transition: transform 0.3s ease;
            /* Animasi saat hover */
        }

        .fab-whatsapp:hover {
            transform: scale(1.1);
            /* Efek membesar saat dihover */
        }

        /* =======================
   Contoh tambahan styling lain (opsional)
   ======================= */

        /* Card kategori */
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
