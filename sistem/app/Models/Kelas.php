<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = 'kode_kelas';
    protected $filled = ['*'];
    public $timestamps = false;

    public function guru() {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode_guru');
    }

    public function mapel() {
        return $this->belongsTo(Mapel::class, 'kode_mapel', 'kode_mapel');
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    public function daftarhadir(){
        return $this->hasMany(DaftarHadir::class);
    }

    public function nilai(){
        return $this->hasMany(Nilai::class);
    }
}
