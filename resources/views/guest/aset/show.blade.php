@extends('layouts.guest.app')

@section('content')
    <section class="max-w-5xl mx-auto mt-20 px-6">
        <div class="bg-white shadow-xl rounded-2xl p-6">

            {{-- BACK --}}
            <a href="{{ route('aset.index') }}" class="text-sm text-blue-600 flex items-center gap-1 mb-6">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                {{-- FOTO ASET --}}
                <div>
                    @if (!empty($aset->foto))
                        <img src="{{ asset('storage/' . $aset->foto) }}" class="w-full h-80 object-cover rounded-xl shadow"
                            alt="Foto Aset">
                    @else
                        <div class="w-full h-80 bg-gray-200 rounded-xl flex flex-col items-center justify-center">
                            <i class="fa fa-image text-5xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Belum upload foto</p>
                        </div>
                    @endif
                </div>

                {{-- INFORMASI UTAMA --}}
                <div>
                    <h2 class="text-3xl font-bold text-slate-800 mb-2">
                        {{ $aset->nama_aset ?? 'Tanpa Nama' }}
                    </h2>

                    <p class="text-gray-600 mb-4">
                        Kode Aset :
                        <span class="font-semibold text-slate-800">
                            {{ $aset->kode_aset ?? '-' }}
                        </span>
                    </p>

                    {{-- TABEL DETAIL DINAMIS --}}
                    <table class="w-full text-sm">

                        @foreach ($aset->getAttributes() as $field => $value)
                            @continue(in_array($field, ['id', 'foto', 'created_at', 'updated_at'])) {{-- skip field yang tidak perlu --}}

                            <tr class="border-b">
                                <td class="py-2 font-semibold capitalize text-slate-700 w-40">
                                    {{ str_replace('_', ' ', $field) }}
                                </td>
                                <td class="py-2 text-slate-600">
                                    {{ $value ?? '-' }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

            {{-- DESKRIPSI (JIKA ADA) --}}
            @if (!empty($aset->deskripsi))
                <div class="mt-10">
                    <h3 class="text-xl font-bold mb-2">Deskripsi</h3>
                    <p class="text-gray-700 bg-gray-50 border p-4 rounded-xl">
                        {!! nl2br(e($aset->deskripsi)) !!}
                    </p>
                </div>
            @endif

            {{-- JIKA TIDAK ADA DESKRIPSI --}}
            @if (empty($aset->deskripsi))
                <div class="mt-10">
                    <h3 class="text-xl font-bold mb-2">Deskripsi</h3>
                    <p class="text-gray-500 italic">Belum ada deskripsi aset.</p>
                </div>
            @endif

            {{-- ACTION --}}
            <div class="mt-10 flex gap-3">
                <a href="{{ route('aset.edit', $aset) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                    Edit
                </a>

                <form action="{{ route('aset.destroy', $aset) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm">
                        Hapus
                    </button>
                </form>
            </div>

        </div>
    </section>
@endsection
