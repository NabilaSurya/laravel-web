<?php

namespace Database\Seeders;

use App\Models\Aset;
use App\Models\KategoriAset;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil salah satu kategori yang sudah ada
        $kategori = KategoriAset::first();

        // Jika belum ada, berhenti agar tidak error
        if (!$kategori) {
            $this->command->warn('⚠️ Tidak ada data kategori_aset. Jalankan seeder kategori dulu.');
            return;
        }

        Aset::create([
            'kategori_id' => $kategori->kategori_id,
            'kode_aset' => 'AST001',
            'nama_aset' => 'Laptop Dell Inspiron',
            'tgl_perolehan' => '2024-02-20',
            'nilai_perolehan' => 10500000,
            'kondisi' => 'Baik',
        ]);

        Aset::create([
            'kategori_id' => $kategori->kategori_id,
            'kode_aset' => 'AST002',
            'nama_aset' => 'Printer Canon',
            'tgl_perolehan' => '2023-10-12',
            'nilai_perolehan' => 2500000,
            'kondisi' => 'Cukup',
        ]);
    }
}
