<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $primaryKey = 'kode_jadwal';
    protected $filled = ['*'];
    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    }

    public function ruang() {
        return $this->belongsTo(Ruang::class, 'kode_ruang', 'kode_ruang');
    }
}
