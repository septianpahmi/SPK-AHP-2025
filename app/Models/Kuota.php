<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
    use HasFactory;
    protected $fillable = ['id_beasiswa', 'id_kelas', 'kuota'];
    public function idBeasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }
    public function idKelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
