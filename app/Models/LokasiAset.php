<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LokasiAset extends Model
{
    use HasFactory;

    protected $table = 'lokasi_aset';
    protected $primaryKey = 'lokasi_id';

    protected $fillable = [
        'aset_id',
        'lokasi_text',
        'rt',
        'rw',
        'keterangan',
    ];

    /**
     * Relasi ke tabel Aset
     */
    public function aset()
    {
        // Asumsi tabel aset primary key = 'id'
        return $this->belongsTo(Aset::class, 'aset_id', 'aset_id');
    }

    /**
     * Relasi ke tabel Media (many)
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id')
            ->where('ref_table', 'lokasi_aset')
            ->orderBy('sort_order');
    }

    /**
     * Ambil 1 foto utama
     */
    public function fotoUtama()
    {
        return $this->hasOne(Media::class, 'ref_id')
            ->where('ref_table', 'lokasi_aset')
            ->orderBy('sort_order');
    }
}
