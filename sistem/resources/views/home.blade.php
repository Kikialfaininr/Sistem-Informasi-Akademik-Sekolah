@extends('layouts.app-dashboard')
@section('content')
<section class="content">
    <div class="inner">
        @if(Auth::user()->level == 'admin' || Auth::user()->level == 'kepsek')
        <div class="row">
            <div class="col-md-5" style="margin: 10px 0 0 215px;">
                <div class="box"
                    style="padding: 15px; background-color: #white; color: #F4A03A; border-radius: 10px; border: 3px solid #F4A03A">
                    <center><i class="fas fa-users fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahpengguna as $no => $value)
                            {{$value->jumlahpengguna}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Jumlah Pengguna Sistem
                        </center>
                    </h4>
                </div>
            </div>
            <div class="col-md-5" style="margin-top: 10px;">
                <div class="box"
                    style="padding: 15px; background-color: #white; color: #F4A03A; border-radius: 10px; border: 3px solid #F4A03A;">
                    <center><i class="far fa-newspaper fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahberita as $no => $value)
                            {{$value->jumlahberita}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Jumlah Berita Terupload
                        </center>
                    </h4>
                </div>
            </div>
            <div class="col-md-5" style="margin: 20px 0 0 215px;">
                <div class="box"
                    style="padding: 15px; background-color: #white; color: #F4A03A; border-radius: 10px; border: 3px solid #F4A03A;">
                    <center><i class="fas fa-chalkboard-teacher fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahguru as $no => $value)
                            {{$value->jumlahguru}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Total Guru
                        </center>
                    </h4>
                </div>
            </div>
            <div class="col-md-5" style="margin-top: 20px;">
                <div class="box"
                    style="padding: 15px; background-color: #white; color: #F4A03A; border-radius: 10px; border: 3px solid #F4A03A;">
                    <center><i class="far fa-address-book fa-4x"></i></center><br>
                    <h1>
                        <center>
                            @foreach($jumlahsiswa as $no => $value)
                            {{$value->jumlahsiswa}}
                            @endforeach
                        </center>
                    </h1>
                    <h4>
                        <center>Total Siswa
                        </center>
                    </h4>
                </div>
            </div>
        </div>
        @endif

        @if(Auth::user()->level == 'guru')
        <div class="card col-md-4" style="margin: 0 0 0 500px;">
            <div class="card-header">
                <h5 class="mt-3">Selamat datang, <strong>{{ Auth::user()->username }}</strong></h5>
            </div>
            <div class="card-body text-center">
                <i class="fa-solid fa-user-circle fa-5x" style="color: #f4a03a;"></i>
            </div>
            @foreach ($guru as $value)
            <table class="table mt-4">
                <tbody>
                    <tr>
                        <th>NIP</th>
                        <td>{{ $value->nip }}</td>
                    </tr>
                    <tr>
                        <th>Nama Guru</th>
                        <td>{{ $value->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $value->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Jabatan Guru</th>
                        <td>{{ $value->jabatan_guru }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Guru</th>
                        <td>{{ $value->jenis_guru }}</td>
                    </tr>
                    <tr>
                        <th>Tugas Mengajar</th>
                        <td>{{ $value->tugas_mengajar }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $value->keterangan }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
        @endif


        @if(Auth::user()->level == 'siswa')
        <div class="card col-md-6" style="margin: 0 0 0 460px;">
            <div class="card-header">
                <h5 class="mt-3">Selamat datang, <strong>{{ Auth::user()->username }}</strong></h5>
            </div>
            <div class="card-body text-center">
                <i class="fa-solid fa-user-circle fa-5x" style="color: #f4a03a;"></i>
            </div>
            @foreach ($siswa as $value)
            <table class="table mt-4">
                <tbody>
                    <tr>
                        <th>Nomor Induk</th>
                        <td>{{ $value->no_induk }}</td>
                    </tr>
                    <tr>
                        <th>Nama Siswa</th>
                        <td>{{ $value->nama_siswa }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $value->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Masuk</th>
                        <td>{{ $value->tahun_masuk }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection