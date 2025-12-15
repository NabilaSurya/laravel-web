<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeliharaanAset extends Model
{
    protected $table = 'pemeliharaan_aset';
    protected $primaryKey = 'pemeliharaan_id';

    protected $fillable = [
        'aset_id',
        'tanggal',
        'tindakan',
        'biaya',
        'pelaksana',
        'foto',
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id', 'aset_id');
    }
    public function media()
    {
        return $this->hasMany(\App\Models\Media::class, 'ref_id', 'pemeliharaan_id')
            ->where('ref_table', 'pemeliharaan_aset');
    }
}
