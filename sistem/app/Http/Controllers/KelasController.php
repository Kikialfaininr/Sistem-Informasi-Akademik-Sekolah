<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Guru;
use Redirect;
use Session;
use PDF;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = kelas::with('guru','mapel')->get();
        $mapel = mapel::all();
        $guru = guru::all();
        return view('kelas', compact('kelas','mapel','guru'));
    }

    public function tambah()
    {
        $mapel = mapel::all();
        $guru = guru::all();

        return view('kelas', compact('mapel', 'guru'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_kelas'=>'unique:kelas'
        ]);

        $kelas = new kelas();
            $kelas->kode_mapel = $request->kode_mapel;
            $kelas->kode_guru = $request->kode_guru;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->kategori = $request->kategori;
            $kelas->tahun_ajaran = $request->tahun_ajaran;
            $kelas->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/kelas');
            
    }

    public function edit(Request $request, $id)
    {
        $kelas = kelas::where('kode_kelas',$id)->first();
        return view('kelas-edit', compact('kelas','mapel','guru'));
    }

    public function update(Request $request, $id)
    {
        $kelas = kelas::where('kode_kelas',$id)->first();
            $kelas->kode_mapel = $request->kode_mapel;
            $kelas->kode_guru = $request->kode_guru;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->kategori = $request->kategori;
            $kelas->tahun_ajaran = $request->tahun_ajaran;
        $kelas->save();
        Session::flash('sukses','Data berhasil diupdate');
        return Redirect('/kelas');
    }

    public function hapus(Request $request, $id)
    {
        $kelas = kelas::where('kode_kelas',$id);
        $kelas->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/kelas');
    }

    public function downloadpdf()
    {
        $kelas = kelas::get();
        $pdf = PDF::loadview('datakelas-pdf', compact('kelas'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatakelas.pdf');
    }
}