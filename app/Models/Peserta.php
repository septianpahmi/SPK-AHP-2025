<?php

namespace App\Models;

use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Kelas;
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

    public function siswa()
    {
        return $this->belongsTo(User::class, 'id_siswa');
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function subkriteria()
    {
        return $this->belongsTo(Subkriteria::class, 'id_subkriteria');
    }
}
