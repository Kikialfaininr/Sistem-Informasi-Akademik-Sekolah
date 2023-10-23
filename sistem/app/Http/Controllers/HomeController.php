<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Siswa;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahpengguna = DB::select('select count(id) as jumlahpengguna from users');
        $jumlahberita = DB::select('select count(kode_berita) as jumlahberita from berita');
        $jumlahguru = DB::select('select count(nip) as jumlahguru from guru');
        $jumlahsiswa = DB::select('select count(no_induk) as jumlahsiswa from siswa');

        $user = auth()->user();
        $guru = guru::where('kode_guru', $user->kode_guru)->get();
        $siswa = siswa::where('kode_siswa', $user->kode_siswa)->get();
        
        return view('home', compact('jumlahpengguna', 'jumlahberita', 'jumlahguru', 'jumlahsiswa','guru','siswa', 'user'));
    }
}
