<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Kelas;
use Redirect;
use Session;
use PDF;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = nilai::with('siswa','kelas')->get();
        $kelas = kelas::all();
        $siswa = siswa::all();

        return view('nilai', compact('nilai','kelas','siswa'));
    }


    public function tambah()
    {
        $kelas = kelas::all();
        $siswa = siswa::all();

        return view('nilai', compact('kelas', 'siswa'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_nilai'=>'unique:nilai'
        ]);

        $nilai = new nilai();
            $nilai->kode_kelas = $request->kode_kelas;
            $nilai->kode_siswa = $request->kode_siswa;
            $nilai->nilai = $request->nilai;
            $nilai->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/nilai');
            
    }

    public function edit(Request $request, $id)
    {
        $nilai = nilai::where('kode_nilai',$id)->first();
        return view('nilai-edit', compact('nilai','kelas','siswa'));
    }

    public function update(Request $request, $id)
    {
        $nilai = nilai::where('kode_nilai',$id)->first();
            $nilai->kode_kelas = $request->kode_kelas;
            $nilai->kode_siswa = $request->kode_siswa;
            $nilai->nilai = $request->nilai;
        $nilai->save();
        Session::flash('sukses','Data berhasil diupdate');
        return Redirect('/nilai');
    }

    public function hapus(Request $request, $id)
    {
        $nilai = nilai::where('kode_nilai',$id);
        $nilai->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/nilai');
    }

    public function downloadpdf()
    {
        $nilai = nilai::get();
        $pdf = PDF::loadview('datanilai-pdf', compact('nilai'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatanilai.pdf');
    }
}