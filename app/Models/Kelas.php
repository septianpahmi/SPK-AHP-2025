<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'tingkat', 'jurusan', 'kelas'];

    public function beasiswa()
    {
        return $this->hasOne(Beasiswa::class, 'foreign_key', 'local_key');
    }
}
