<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Styling for Hero Background Image (assumed to be missing) */
    .hero-bg {
        /* Menggunakan warna biru gelap di overlay untuk konsistensi */
        background-image: linear-gradient(rgba(17, 24, 39, 0.75), rgba(30, 64, 175, 0.75));
    }

    /* Fixing the offset caused by fixed header */
    main {
        /* SOLUSI Jarak Konten dari Header */
        padding-top: 80px;
        /* Adjust based on header height */
    }

    /* Kursor pointer untuk kartu yang bisa diklik */
    .category-card:hover {
        cursor: pointer;
    }

    /* SOLUSI FAB WHATSAPP (Tombol yang Hilang) */
    .fab-whatsapp {
        position: fixed;
        bottom: 20px;
        /* Jarak dari bawah */
        right: 20px;
        /* Jarak dari kanan */
        width: 50px;
        /* Ukuran tombol */
        height: 50px;
        background-color: #25D366;
        /* Warna hijau WhatsApp */
        color: white;
        border-radius: 50%;
        /* Bentuk lingkaran */
        text-align: center;
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
        display: flex;
        /* Untuk memusatkan ikon */
        align-items: center;
        justify-content: center;
        font-size: 24px;
        /* Ukuran ikon */
        z-index: 1000;
        /* Pastikan tombol di atas elemen lain */
        transition: transform 0.3s ease;
    }

    .fab-whatsapp:hover {
        transform: scale(1.1);
        /* Efek saat disentuh kursor */
    }
</style>
