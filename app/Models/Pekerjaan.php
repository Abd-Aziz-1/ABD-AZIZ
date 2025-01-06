<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'nama_pekerjaan',
        'instansi',
        'tahun_mulai',
        'tahun_selesai',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
