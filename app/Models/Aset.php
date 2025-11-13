<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';
    protected $primaryKey = 'aset_id';
    protected $fillable = [
        'kategori_id',
        'kode_aset',
        'nama_aset',
        'tgl_perolehan',
        'nilai_perolehan',
        'kondisi'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }
}
