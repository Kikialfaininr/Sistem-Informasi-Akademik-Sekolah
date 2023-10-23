<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    use HasFactory;
    protected $table = 'daftarhadir';
    protected $primaryKey = 'kode_dh';
    protected $filled = ['*'];
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }
}
