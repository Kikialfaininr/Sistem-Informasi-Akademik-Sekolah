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
        <h3 class="text-center"><u>LAPORAN JADWAL KEGIATAN BELAJAR MENGAJAR</u></h3>
    </div>
</div>
    <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Jam Mulai</th>
                <th class="text-center">Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwal as $no => $value)
            <tr>
                <td align="center">{{$no+1}}</td>
                <td align="center">{{$value->kelas->nama_kelas}}</td>
                <td align="center">{{$value->ruang->nama_ruang}}</td>
                <td align="center">{{$value->mulai}}</td>
                <td align="center">{{$value->selesai}}</td>
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