<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
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
        'kondisi',
        'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriAset::class, 'kategori_id');
    }
    public function scopeSearch($query, $request, $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $col) {
                    $q->orWhere($col, 'like', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }

    public function scopeFilterTanggal($query, $request)
    {
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('tgl_perolehan', [
                $request->tanggal_awal,
                $request->tanggal_akhir
            ]);
        }

        return $query;
    }

    public function scopeFilterKategori($query, $request)
    {
        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }
        return $query;
    }
}
