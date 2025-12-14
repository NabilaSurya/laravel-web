@extends('layouts.guest.app')

@section('title', 'Pengembang')

@section('content')
    <div class="w-full px-6 py-10 mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-xl mx-auto">

            <h2 class="text-2xl font-bold mb-4 text-center">Profil Pengembang</h2>

            <div class="space-y-3 text-lg">
                <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
                <p><strong>NIM:</strong> {{ $data['nim'] }}</p>
                <p><strong>Kelas:</strong> {{ $data['kelas'] }}</p>
            </div>

            <div class="mt-6 text-center">
                <a href="/" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
@endsection
