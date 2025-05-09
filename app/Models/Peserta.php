<?php

namespace App\Models;

use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Subkriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'id_beasiswa',
        'id_kelas',
        'id_subkriteria',
        'penghasilan',
        'tanggungan',
        'pekerjaan',
        'asset',
        'status',
        'sktm',
        'dok_lainnya',
    ];

    public function idSiswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }
    public function idBeasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }
    public function idKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
