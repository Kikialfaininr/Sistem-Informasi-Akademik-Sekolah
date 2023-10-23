<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Ruang;
use App\Models\Kelas;
use Redirect;
use Session;
use PDF;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = jadwal::with('ruang','kelas')->get();
        $kelas = kelas::all();
        $ruang = ruang::all();
        return view('jadwal', compact('jadwal','kelas','ruang'));
    }

    public function tambah()
    {
        $kelas = kelas::all();
        $ruang = ruang::all();

        return view('jadwal', compact('kelas', 'ruang'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_jadwal'=>'unique:jadwal'
        ]);

        $jadwal = new jadwal();
            $jadwal->kode_kelas = $request->kode_kelas;
            $jadwal->kode_ruang = $request->kode_ruang;
            $jadwal->mulai = $request->mulai;
            $jadwal->selesai = $request->selesai;
            $jadwal->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/jadwal');
            
    }

    public function edit(Request $request, $id)
    {
        $jadwal = jadwal::where('kode_jadwal',$id)->first();
        return view('jadwal-edit', compact('jadwal','kelas','ruang'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = jadwal::where('kode_jadwal',$id)->first();
            $jadwal->kode_kelas = $request->kode_kelas;
            $jadwal->kode_ruang = $request->kode_ruang;
            $jadwal->mulai = $request->mulai;
            $jadwal->selesai = $request->selesai;
        $jadwal->save();
        Session::flash('sukses','Data berhasil diupdate');
        return Redirect('/jadwal');
    }

    public function hapus(Request $request, $id)
    {
        $jadwal = jadwal::where('kode_jadwal',$id);
        $jadwal->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/jadwal');
    }

    public function downloadpdf()
    {
        $jadwal = jadwal::get();
        $pdf = PDF::loadview('datajadwal-pdf', compact('jadwal'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatajadwal.pdf');
    }
}