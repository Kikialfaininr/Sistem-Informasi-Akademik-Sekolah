<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;
use Redirect;
use Session;
use PDF;

class RuangController extends Controller
{
    public function index(Request $request)
    {
        if ($request){
            $data = ruang::where('nama_ruang', 'LIKE', '%' .$request->search. '%')->get();
        } else{
            $data = DB::select('select * from ruang order by created_at DESC');
        }
        return view('ruang', compact('data', 'request'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request, [
            'kode_ruang'=>'unique:ruang'
        ]);

        $data = new ruang();
            $data->nama_ruang = $request->nama_ruang;
        $data->save();
        Session::flash('sukses','Data berhasil ditambah');
        return Redirect('/ruang');
            
    }

    public function edit(Request $request, $id)
    {
        $data = ruang::where('kode_ruang',$id)->first();
        return view('ruang-edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ruang::where('kode_ruang', $id)->first();
        $data->nama_ruang = $request->nama_ruang;
        $data->save();
        Session::flash('sukses', 'Data berhasil diubah');
        return Redirect('/ruang');
    }

    public function hapus(Request $request, $id)
    {
        $data = ruang::where('kode_ruang',$id);
        $data->delete();
        Session::flash('sukses','Data berhasil dihapus');
        return Redirect('/ruang');
    }

    public function downloadpdf()
    {
        $data = ruang::get();
        $pdf = PDF::loadview('dataruang-pdf', compact('data'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream('laporandataruang.pdf');
    }
}
