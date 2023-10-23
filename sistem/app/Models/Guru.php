<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $filled = ['*'];
    protected $primaryKey = 'kode_guru';
    public $timestamps = false;

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

    public function adminuser(){
        return $this->hasMany(AdminUser::class);
    }
}
