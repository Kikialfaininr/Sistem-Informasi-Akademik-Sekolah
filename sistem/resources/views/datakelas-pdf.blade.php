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
        <h3 class="text-center"><u>LAPORAN DATA KELAS</u></h3>
    </div>
</div>
    <table id="jadwal" class="table table-responsive table-bordered table-hover table-striped" style="width: 100%;">
        <thead>
            <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Guru Pengampu</th>
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Tahun Ajaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $no => $value)
            <tr>
                <<td align="center">{{$no+1}}</td>
                    <td align="center">{{$value->mapel->nama_mapel}}</td>
                    <td align="center">{{$value->guru->nama_guru}}</td>
                    <td align="center">{{$value->nama_kelas}}</td>
                    <td align="center">{{$value->kategori}}</td>
                    <td align="center">{{$value->tahun_ajaran}}</td>
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