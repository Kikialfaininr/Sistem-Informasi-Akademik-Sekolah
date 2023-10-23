<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $filled = ['*'];
    protected $fillable = ['name','username', 'email', 'level', 'password', 'kata_sandi', 'kode_guru', 'kode_siswa' ];
    protected $primaryKey = 'id';

    public function guru() {
        return $this->belongsTo(Guru::class, 'kode_guru', 'kode_guru');
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }
}
