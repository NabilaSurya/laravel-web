<!DOCTYPE html>
<html>

<head>
    <title>Aset Inventaris Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h2>📋 Daftar Aset Inventaris Desa</h2>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Aset</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kursi Rapat</td>
                <td>Peralatan Kantor</td>
                <td>Balai Desa</td>
                <td>Masih layak pakai</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Proyektor</td>
                <td>Elektronik</td>
                <td>Balai Desa</td>
                <td>Digunakan untuk sosialisasi</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
