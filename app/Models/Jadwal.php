<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "jadwals";
    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Siswa
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
