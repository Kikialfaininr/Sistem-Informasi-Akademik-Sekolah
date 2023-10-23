<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $table = 'ruang';
    protected $filled = ['*'];
    protected $primaryKey = 'kode_ruang';
    public $timestamps = false;

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }
}
