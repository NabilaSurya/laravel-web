<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'media_id';

    protected $fillable = [
        'ref_table',
        'ref_id',
        'file_name',
        'caption',
        'mime_type',
        'sort_order'
    ];

    public $timestamps = false;

    /**
     * Relasi dinamis ke model manapun
     */
    public function parent()
    {
        return $this->morphTo(null, 'ref_table', 'ref_id');
    }

    /**
     * URL siap pakai ke blade
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_name);
    }
}
