<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'tahun_lulus',
        'no_hp',
        'alamat',
    ];

    public function programStudi()
    {
        return $this->belongsToMany(ProgramStudi::class, 'alumni_program_studi')
            ->withPivot('tahun_masuk', 'tahun_keluar');
    }

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
}
