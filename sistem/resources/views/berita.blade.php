@extends('layouts.app')

@section('content')
<div class="card" style="margin: 120px 80px 100px 80px;">
    <h1 style="color: #135E69; margin-top: 50px; font-weight: bold; text-align: center;">Halaman Berita</h1>
    @foreach($berita as $no => $value)
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin: 20px 20px 20px 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <img class="card-img-top" style="width: 100%; height: 200px; margin: 10px 10px 10px 10px;"
                            src="image\foto{{$value->foto}}" alt="Card image cap">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h4 class="card-title" style="color: #135E69; font-weight: bold;">{{$value->judul_berita}}
                            </h4>
                            <p style="color: grey;">Diunggah pada: {{$value->tanggal_berita}}</p>
                            <p class="card-text">{{ Illuminate\Support\Str::limit($value->isi, 150) }}</p>
                            <button type="button" title="edit data" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#BeritaDetail{{$value->kode_berita}}"><i class="fa fa-info-circle"
                                    aria-hidden="true"></i> Baca Selengkapnya</button>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@foreach($berita as $no => $value)
<div class="modal fade" id="BeritaDetail{{$value->kode_berita}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$value->judul_berita}}</h4>
            </div>
            <div class="modal-body">
                <div>
                    <img class="card-img-top" style=" width: 98%; height: 100%; align: center;"
                        src="image\foto{{$value->foto}}" alt="Card image cap">
                    <p style="color: grey;">Diunggah pada: {{$value->tanggal_berita}}</p>
                    <p class="card-text">{{$value->isi}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection