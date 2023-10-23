<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Guru;
use App\Models\Siswa;
use Redirect;
use Session; 
use Hash;
use DB;
use PDF;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $adminuser = adminuser::with('guru','siswa')->get();
        $guru = guru::all();
        $siswa = siswa::all();

        return view('adminuser', compact('adminuser', 'guru', 'siswa'));
    }

    public function tambah()
    {
        $guru = guru::all();
        $siswa = siswa::all();

        return view('adminuser', compact('guru', 'siswa'));
    }

    public function simpan(Request $request)
    {
        $adminuser = new adminuser([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'level' => $request['level'],
            'password' => Hash::make($request['password']),
            'kata_sandi' => $request['kata_sandi'],
            'kode_guru' => $request['kode_guru'],
            'kode_siswa' => $request['kode_siswa'],
        ]);
        $adminuser->save();
        Session::flash('sukses', 'Data berhasil di simpan');
        return Redirect('/adminuser');
    }

    public function edit(Request $request, $id)
    {
        $adminuser = adminuser::where('id', $id)->first();
        return view('adminuser-edit', compact('adminuser'));
    }

    public function update(Request $request, $id)
    {
        $adminuser = adminuser::where('id', $id)->first();
            $adminuser->name = $request->name;
            $adminuser->username = $request->username;
            $adminuser->email = $request->email;
            $adminuser->level = $request->level;
            $adminuser->password = Hash::make($request->password);
            $adminuser->kata_sandi = $request->kata_sandi;
            $adminuser->kode_guru = $request->kode_guru;
            $adminuser->kode_siswa = $request->kode_siswa;
        $adminuser->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/adminuser');
    }

    public function hapus(Request $request, $id)
    {
        $adminuser = adminuser::where('id', $id)->first();
        $adminuser->delete();
        Session::flash('sukses', 'Data berhasil dihapus');
        return Redirect('/adminuser');
    }

    public function downloadpdf()
    {
        $adminuser = adminuser::get();
        $pdf = PDF::loadview('datapengguna-pdf', compact('adminuser'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatapengguna.pdf');
    }
}

