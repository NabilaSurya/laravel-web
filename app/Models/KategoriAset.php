<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
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
    public function scopeFilter(Builder $query, Request $request, array $filterableColumns): Builder
    {
        // Karena form di view menggunakan input 'search', kita periksa input 'search'.
        if ($request->filled('search')) {
            $searchValue = $request->input('search');

            // Kita hanya mencari di kolom 'kode' karena itulah yang ada di $filterableColumns = ['kode']
            // PENTING: TIDAK ADA .get(), .all(), atau .first() di sini.
            if (in_array('kode', $filterableColumns)) {
                $query->where('kode', 'like', '%' . $searchValue . '%');
            }
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('kode', 'like', "%{$search}%");
            });
        }

        return $query; // Mengembalikan Query Builder
    }
}
