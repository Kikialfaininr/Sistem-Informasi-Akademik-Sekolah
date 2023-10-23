<style>
table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
}
.text-kop {
    text-align: center;
    line-height: 0.3;
}
</style>
<div class="container" align="center">
    <div class="row">
        <h4 class="text-center text-kop">PEMERINTAH KABUPATEN CILACAP</h4>
        <h4 class="text-center text-kop">DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
        <h2 class="text-center text-kop">SEKOLAH DASAR NEGERI GRUGU 03</h2>
        <h4 class="text-center text-kop">KECAMATAN KAWUNGANTEN</h4>
        <h5 class="text-center text-kop">Alamat : Dusun Ajibarang Grugu Kawunganten, Kab. Cilacap, 53253</h5>
        <h4 class="text-center text-kop">CILACAP</h4>
        <hr><br>
        <h3 class="text-center"><u>LAPORAN DATA NILAI</u></h3>
    </div>
</div>
    <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped" style="width: 100%;">
        <thead>
            <tr>
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru' || Auth::user()->level == 'kepsek')
                <th class="text-center">No</th>
                @endif
                <th class="text-center">Nama Siswa</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Nilai</th>
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                <th class="text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($nilai as $no => $value)
            @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru' || Auth::user()->level == 'kepsek')
            <tr>
                <td align="center">{{$no+1}}</td>
                <td align="center">{{$value->siswa->nama_siswa}}</td>
                <td align="center">{{$value->kelas->nama_kelas}}</td>
                <td align="center">{{$value->nilai}}</td>
                @endif
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                <td align="center">
                    <button type="button" title="Edit Data" class="btn btn-primary btn-xs" data-toggle="modal"
                        data-target="#UbahDataNilai{{$value->kode_nilai}}" style="margin: 5px;"><i
                            class="fa fa-edit"></i></button>
                    <a href="{{url($value->kode_nilai.'/hapus-nilai')}}">
                        <button title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                    </a>
                </td>
                @endif
            </tr>
            @if(Auth::user()->level == 'siswa')
            @if($value->kode_siswa == Auth::user()->kode_siswa)
            <tr>
                <td align="center">{{$value->siswa->nama_siswa}}</td>
                <td align="center">{{$value->kelas->nama_kelas}}</td>
                <td align="center">{{$value->nilai}}</td>
            </tr>
            @endif
            @endif
            @endforeach
        </tbody>
    </table>
</div>
<div style="margin-left: 800px;">
    <p>Cilacap, ____________</p>
    <p>Kepala Sekolah</p>
    <br><br><br>
    <p>(___________________)</p>
</div>