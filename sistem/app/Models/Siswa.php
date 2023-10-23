<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $filled = ['*'];
    protected $primaryKey = 'kode_siswa';
    public $timestamps = false;

    public function daftarhadir(){
        return $this->hasMany(DaftarHadir::class);
    }

    public function nilai(){
        return $this->hasMany(Nilai::class, 'kode_siswa', 'kode_siswa');
    }

    public function adminuser(){
        return $this->hasMany(AdminUser::class);
    }
}
