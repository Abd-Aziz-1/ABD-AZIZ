<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_program',
    ];

    public function alumni()
    {
        return $this->belongsToMany(Alumni::class, 'alumni_program_studi')
            ->withPivot('tahun_masuk', 'tahun_keluar');
    }
}
