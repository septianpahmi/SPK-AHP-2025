<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataSiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'nama_ayah',
        'nama_ibu',
        'id_user',
        'id_kelas',
        'status'
    ];
    public function idKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
