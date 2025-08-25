<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelaSiswa extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'kelas_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
