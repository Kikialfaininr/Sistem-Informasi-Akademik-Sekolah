<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $filled = ['*'];
    protected $primaryKey = 'kode_mapel';
    public $timestamps = false;

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }
}
