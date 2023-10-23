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
        <h3 class="text-center"><u>LAPORAN DATA PENGGUNA SISTEM INFORMASI AKADEMIK</u></h3>
    </div>
</div>
    <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pengguna</th>
                <th class="text-center">Status</th>
                <th class="text-center">Level</th>
                <th class="text-center">Username</th>
                <th class="text-center">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adminuser as $no => $value)
            <tr>
                <td align="center">{{$no+1}}</td>
                <td align="center">
                    {{ isset($value->guru->nama_guru) ? $value->guru->nama_guru : optional($value->siswa)->nama_siswa }}
                </td>
                <td align="center">{{$value->name}}</td>
                <td align="center">{{$value->level}}</td>
                <td align="center">{{$value->username}}</td>
                <td align="center">{{$value->kata_sandi}}</td>
            </tr>
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