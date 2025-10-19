<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriAset extends Model
{
    use HasFactory;
    protected $table = 'kategori_aset';
    protected $primaryKey = 'kategori_id';
    protected $fillable = [
        'nama',
        'kode',
        'deskripsi',
    ];
}
