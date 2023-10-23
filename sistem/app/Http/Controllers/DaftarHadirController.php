<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarHadir;
use App\Models\Siswa;
use App\Models\Kelas;
use Redirect;
use Session;
use PDF;

class DaftarHadirController extends Controller
{
    public function index()
    {
        $daftarhadir = daftarhadir::with('siswa','kelas')->get();
        $kelas = kelas::all();
        $siswa = siswa::all();
        return view('daftarhadir', compact('daftarhadir','kelas','siswa'));
    }

    public function tambah()
    {
        $kelas = kelas::all();
        $siswa = siswa::all();

        return view('daftarhadir', compact('kelas', 'siswa'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_dh'=>'unique:daftarhadir'
        ]);

        $daftarhadir = new daftarhadir();
            $daftarhadir->kode_kelas = $request->kode_kelas;
            $daftarhadir->kode_siswa = $request->kode_siswa;
            $daftarhadir->tanggal = $request->tanggal;
            $daftarhadir->status_kehadiran = $request->status_kehadiran;
            $daftarhadir->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/daftarhadir');
            
    }

    public function edit(Request $request, $id)
    {
        $daftarhadir = daftarhadir::where('kode_dh',$id)->first();
        return view('daftarhadir-edit', compact('daftarhadir','kelas','siswa'));
    }

    public function update(Request $request, $id)
    {
        $daftarhadir = daftarhadir::where('kode_dh',$id)->first();
            $daftarhadir->kode_kelas = $request->kode_kelas;
            $daftarhadir->kode_siswa = $request->kode_siswa;
            $daftarhadir->tanggal = $request->tanggal;
            $daftarhadir->status_kehadiran = $request->status_kehadiran;
        $daftarhadir->save();
        Session::flash('sukses','Data berhasil diupdate');
        return Redirect('/daftarhadir');
    }

    public function hapus(Request $request, $id)
    {
        $daftarhadir = daftarhadir::where('kode_dh',$id);
        $daftarhadir->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/daftarhadir');
    }

    public function downloadpdf()
    {
        $daftarhadir = daftarhadir::get();
        $pdf = PDF::loadview('datadaftarhadir-pdf', compact('daftarhadir'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatadaftarhadir.pdf');
    }
}