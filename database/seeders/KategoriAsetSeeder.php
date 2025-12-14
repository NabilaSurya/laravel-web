<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama TANPA merusak relasi FK
        DB::table('kategori_aset')->delete();

        $data = [];

        for ($i = 1; $i <= 1000; $i++) {
            $data[] = [
                'nama' => 'Kategori Aset ' . $i,
                'kode' => 'KA' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'deskripsi' => 'Kategori aset ini mencakup berbagai jenis barang dan fasilitas milik desa yang digunakan untuk mendukung kegiatan operasional, pelayanan masyarakat, serta pengelolaan aset desa secara berkelanjutan.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('kategori_aset')->insert($data);
    }
}
