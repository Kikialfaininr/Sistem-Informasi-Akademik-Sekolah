@extends('layouts.app-dashboard')

@section('content')
<div class="card" style="margin: 0px 10px 0px 210px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Berita Kegiatan</h1>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="col-md-8">
                <button style="margin: 20px;" type="button" title="tambah data" class="btn btn-primary"
                    data-toggle="modal" data-target="#TambahDataBerita"><i class="fa fa-plus"></i> Tambah Data
                    Berita</button>
                </div>
            <div>
            </div>
        </div>
        <div class="table-responsive" style="width: 97%; margin-left: 15px;">
            <table class="table table-responsive table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal Berita</th>
                        <th class="text-center" width="10%;">foto</th>
                        <th class="text-center">Judul Berita</th>
                        <th class="text-center">Isi Berita</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($data as $no => $value)
                    <tr>
                        <td align="center">{{$no+1}}</td>
                        <td>{{$value->tanggal_berita}}</td>
                        <td align="center">
                            <img src="image\foto{{$value->foto}}" width="100px">
                        </td>
                        <td>{{$value->judul_berita}}</td>
                        <td>{{$value->isi}}</td>
                        <td align="center">
                            <button type="button" title="edit data" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#UbahBerita{{$value->kode_berita}}"><i class="fa fa-edit"></i></button>
                            <a href="{{url($value->kode_berita.'/hapus-berita')}}">
                                <button title="hapus data" class="btn btn-danger btn-xs"><i
                                        class="fa fa-remove"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahDataBerita" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Berita</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('simpan-data-berita')}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="tanggal_berita">{{ __('Tanggal Berita') }}</label>
                        <input id="tanggal_berita" type="datetime-local"
                            class="form-control @error('tanggal_berita') is-invalid @enderror" name="tanggal_berita"
                            value="{{ old('tanggal_berita') }}" required autofocus>
                        @error('tanggal_berita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="foto">{{ __('Foto') }}</label>
                        <input id="foto" onchange="readFoto(event)" type="file"
                            class="form-control @error('foto') is-invalid @enderror" name="foto"
                            value="{{ old('foto') }}" required autofocus>
                            <img id="output" style="width: 100px;">
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="judul_berita">{{ __('Judul Berita') }}</label>
                        <input id="judul_berita" type="text"
                            class="form-control @error('judul_berita') is-invalid @enderror" name="judul_berita"
                            value="{{ old('judul_berita') }}" required autofocus>
                        @error('judul_berita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="isi">{{ __('Isi') }}</label>
                        <input id="isi" type="text"
                            class="form-control @error('isi') is-invalid @enderror" name="isi"
                            value="{{ old('isi') }}" required autofocus>
                        @error('isi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-md-end"></label>
                        <div class="col-md-8">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach($data as $no => $value)
<div class="modal fade" id="UbahBerita{{$value->kode_berita}}" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Berita</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update-berita/'.$value->kode_berita)}}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="tanggal_berita">{{ __('Tanggal Berita') }}</label>
                        <input id="tanggal_berita" type="datetime-local"
                            class="form-control @error('tanggal_berita') is-invalid @enderror" name="tanggal_berita"
                            value="{{ $value->tanggal_berita }}" required autofocus>
                        @error('tanggal_berita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="foto">{{ __('Foto') }}</label>
                        <input id="foto" onchange="readFoto(event)" type="file"
                            class="form-control @error('foto') is-invalid @enderror" name="foto"
                            value="{{ $value->foto }}" required autofocus>
                            <img id="output" style="width: 100px;">
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="judul_berita">{{ __('Judul Berita') }}</label>
                        <input id="judul_berita" type="text"
                            class="form-control @error('judul_berita') is-invalid @enderror" name="judul_berita"
                            value="{{ $value->judul_berita }}" required autofocus>
                        @error('judul_berita')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="isi">{{ __('Isi') }}</label>
                        <input id="isi" type="text"
                            class="form-control @error('isi') is-invalid @enderror" name="isi"
                            value="{{ $value->isi }}" required autofocus>
                        @error('isi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label text-md-end"></label>
                        <div class="col-md-8">
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script type="text/javascript">
var readFoto = function(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};
</script>
@endsection