<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'nama_prestasi',
        'tahun',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
