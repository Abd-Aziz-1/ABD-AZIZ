<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniProgramStudi extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'alumni_program_studi';

    // Kolom-kolom yang dapat diisi (mass-assignable)
    protected $fillable = [
        'alumni_id',
        'program_studi_id',
        'tahun_masuk',
        'tahun_keluar',
    ];

    // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    /**
     * Relasi ke model Alumni (many-to-one)
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id', 'id');
    }

    /**
     * Relasi ke model ProgramStudi (many-to-one)
     */
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_id', 'id');
    }
}
