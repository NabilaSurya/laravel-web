<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $title }}</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Kode Aset</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asets as $aset)
                        <tr>
                            <td class="text-center">{{ $aset['kode_aset'] }}</td>
                            <td>{{ $aset['nama_aset'] }}</td>
                            <td>{{ $aset['kategori'] }}</td>
                            <td>{{ $aset['lokasi'] }}</td>
                            <td class="text-center">
                                @if($aset['kondisi'] == 'Baik')
                                <span class="badge bg-success">Baik</span>
                                @else
                                <span class="badge bg-warning text-dark">{{ $aset['kondisi'] }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>