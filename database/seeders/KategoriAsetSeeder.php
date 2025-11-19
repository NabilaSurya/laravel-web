<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_aset')->insert([
            [
                'nama' => 'Peralatan Kantor',
                'kode' => 'PK',
                'deskripsi' => 'Semua peralatan yang digunakan untuk operasional kantor.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perangkat Keras Komputer',
                'kode' => 'PHK',
                'deskripsi' => 'Perangkat keras termasuk PC, laptop, monitor, dan server.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bangunan',
                'kode' => 'BGN',
                'deskripsi' => 'Aset berupa bangunan fisik dan infrastruktur.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kendaraan',
                'kode' => 'KDR',
                'deskripsi' => 'Aset berupa kendaraan bermotor atau non-bermotor.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
