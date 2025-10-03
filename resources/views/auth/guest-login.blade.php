<!DOCTYPE html>
<html>

<head>
    <title>Login Guest - Aset Inventaris Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h2 class="mb-4">Login Guest - Inventaris Desa</h2>

    <!-- Pesan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Pesan login gagal -->
    @if ($errors->has('login_error'))
        <div class="alert alert-warning">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <!-- Pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/guest-login/process') }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username Guest</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username guest">
        </div>

        <div class="mb-3">
            <label class="form-label">Password Guest</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <button type="submit" class="btn btn-success">Login sebagai Guest</button>
    </form>

</body>

</html>
