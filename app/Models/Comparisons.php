<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comparisons extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_beasiswa',
        'id_peserta',
        'id_subkriteria',
        'penghasilan',
        'tanggungan',
        'pekerjaan',
        'asset',
    ];

    public function idSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
    public function idBeasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }
    public function idPeserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta');
    }
}
