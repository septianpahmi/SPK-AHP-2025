<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuota extends Model
{
   use HasFactory;

    protected $table = 'kuotas'; 
    protected $fillable = ['id_beasiswa', 'id_kelas', 'kuota'];

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'id_beasiswa');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');}
}
