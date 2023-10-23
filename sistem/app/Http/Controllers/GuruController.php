<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Redirect;
use Session;
use PDF;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = guru::where('nama_guru', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from guru order by created_at DESC');
        }
        return view('guru', compact('data', 'request'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_guru'=>'unique:guru'
        ]);

        $data = new guru();
            $data->nip = $request->nip;
            $data->nama_guru = $request->nama_guru;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->agama = $request->agama;
            $data->alamat = $request->alamat;
            $data->jabatan_guru = $request->jabatan_guru;
            $data->jenis_guru = $request->jenis_guru;
            $data->tugas_mengajar = $request->tugas_mengajar;
            $data->keterangan = $request->keterangan;
        $data->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/guru');
            
    }

    public function edit(Request $request, $id)
    {
        $data = guru::where('kode_guru', $id)->first();
        return view('guru-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = guru::where('kode_guru', $id)->first();
            $data->nip = $request->nip;
            $data->nama_guru = $request->nama_guru;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->agama = $request->agama;
            $data->alamat = $request->alamat;
            $data->jabatan_guru = $request->jabatan_guru;
            $data->jenis_guru = $request->jenis_guru;
            $data->tugas_mengajar = $request->tugas_mengajar;
            $data->keterangan = $request->keterangan;
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/guru');
    }

    public function hapus(Request $request, $id)
    {
        $data = guru::where('kode_guru',$id);
        $data->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/guru');
    }

    public function downloadpdf()
    {
        $data = guru::get();
        $pdf = PDF::loadview('dataguru-pdf', compact('data'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandataguru.pdf');
    }
}