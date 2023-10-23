<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Redirect;
use Session;
use PDF;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = siswa::where('nama_siswa', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from siswa order by created_at DESC');
        }
        return view('siswa', compact('data', 'request'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_siswa'=>'unique:siswa'
        ]);

        $data = new siswa();
            $data->no_induk = $request->no_induk;
            $data->nama_siswa = $request->nama_siswa;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->agama = $request->agama;
            $data->alamat = $request->alamat;
            $data->tahun_masuk = $request->tahun_masuk;
        $data->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/siswa');
            
    }

    public function edit(Request $request, $id)
    {
        $data = siswa::where('kode_siswa',$id)->first();
        return view('siswa-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = siswa::where('kode_siswa', $id)->first();
            $data->no_induk = $request->no_induk;
            $data->nama_siswa = $request->nama_siswa;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->agama = $request->agama;
            $data->alamat = $request->alamat;
            $data->tahun_masuk = $request->tahun_masuk;
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/siswa');
    }

    public function hapus(Request $request, $id)
    {
        $data = siswa::where('kode_siswa',$id);
        $data->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/siswa');
    }

    public function downloadpdf()
    {
        $data = siswa::get();
        $pdf = PDF::loadview('datasiswa-pdf', compact('data'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandatasiswa.pdf');
    }
}
