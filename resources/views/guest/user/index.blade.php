@extends('layouts.guest.app')

@section('content')
    <div class="w-full px-6 py-10 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 sm:flex-none">

                {{-- Header --}}
                <div class="mb-8 mt-4">
                    <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">Kelola Akun Pengguna</h1>
                    <p class="text-base text-gray-500 dark:text-gray-400 mt-1">Daftar semua akun pengguna sistem.</p>
                </div>

                {{-- Flash Message --}}
                @if (session('success'))
                    <div class="relative px-6 py-3 mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg dark:bg-green-900/50 dark:text-green-300"
                        role="alert">
                        <span class="font-medium">Berhasil!</span> {{ session('success') }}
                    </div>
                @endif

                {{-- Tambah User Baru --}}
                <div class="mb-6 flex justify-end">
                    <a href="{{ route('user.create') }}"
                        class="inline-flex items-center px-6 py-2 text-sm font-semibold text-white capitalize transition duration-300 ease-in-out rounded-lg shadow-md bg-blue-600 hover:bg-blue-700 transform hover:scale-[1.02]">
                        <i class="fas fa-plus-circle mr-2"></i> Tambah User Baru
                    </a>
                </div>

                {{-- Daftar User --}}
                <div class="flex flex-wrap -mx-3">
                    @forelse ($users as $user)
                        <div class="w-full md:w-1/2 lg:w-1/3 p-3">
                            <div
                                class="bg-white dark:bg-slate-850 shadow-lg hover:shadow-xl transition-shadow duration-300 rounded-xl p-6 border border-gray-100 dark:border-slate-700">

                                {{-- Header Card --}}
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center text-white text-xl mr-4">
                                        <i class="fas fa-user fa-lg"></i>
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                                    </div>
                                </div>

                                {{-- Role --}}
                                @if (isset($user->role))
                                    <div class="mb-4">
                                        <span
                                            class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">
                                            {{ ucwords($user->role) }}
                                        </span>
                                    </div>
                                @endif

                                {{-- Aksi --}}
                                <div
                                    class="flex justify-start space-x-3 pt-3 border-t border-gray-100 dark:border-slate-700 mt-4">
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="text-xs font-medium text-green-600 dark:text-green-400 hover:text-green-800 transition duration-150 ease-in-out flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>

                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user {{ $user->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-xs font-medium text-red-600 dark:text-red-400 hover:text-red-800 transition duration-150 ease-in-out flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        {{-- Jika tidak ada data --}}
                        <div class="w-full p-3">
                            <div
                                class="bg-white dark:bg-slate-850 shadow-lg rounded-xl p-8 text-center border border-gray-100 dark:border-slate-700">
                                <i class="fas fa-info-circle text-2xl text-gray-500 mb-3"></i>
                                <p class="text-base text-gray-600 dark:text-gray-400">Belum ada data user yang terdaftar.
                                </p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
@endsection
