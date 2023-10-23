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
        <h3 class="text-center"><u>LAPORAN DATA GURU</u></h3>
    </div>
</div>
        <table id="guru" class="table table-responsive table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Tempat Lahir</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Agama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Jabatan Guru</th>
                    <th class="text-center">Jenis Guru</th>
                    <th class="text-center">Tugas Mengajar</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Kode Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no => $value)
                <tr>
                    <td align="center">{{$no+1}}</td>
                    <td>{{$value->nip}}</td>
                    <td>{{$value->nama_guru}}</td>
                    <td>{{$value->jenis_kelamin}}</td>
                    <td>{{$value->tempat_lahir}}</td>
                    <td>{{$value->tanggal_lahir}}</td>
                    <td align="center">{{$value->agama}}</td>
                    <td>{{$value->alamat}}</td>
                    <td>{{$value->jabatan_guru}}</td>
                    <td>{{$value->jenis_guru}}</td>
                    <td>{{$value->tugas_mengajar}}</td>
                    <td align="center">{{$value->keterangan}}</td>
                    <td>{{$value->kode_login}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div style="margin-left: 800px;">
    <p>Cilacap, ____________</p>
    <p>Kepala Sekolah</p>
    <br><br><br>
    <p>(___________________)</p>
</div>