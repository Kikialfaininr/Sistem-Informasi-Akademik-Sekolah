@extends('layouts.app')

@section('content')
<div id="demo" class="carousel slide carouselHero" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="sistem/img/profil1.jpeg" alt="Laboratorium" class="d-block image"
                style="width:100%; height: 650px; filter: brightness(40%);">
            <div class="carousel-caption caption" style="top: 30%; ">
                <h3 style="color: #135E69; font-weight: bold;">Selamat Datang</h3>
                <h1 class="big-text">SD NEGERI GRUGU 03 KAWUNGANTEN</h1>
            </div>
        </div>
        <div class="carousel-item">
            <div class="gradient-overlay"></div>
            <img src="sistem/img/profil2.jpeg" alt="Programming" class="d-block image "
                style="width:100%; height: 650px; filter: brightness(40%);">
            <div class="carousel-caption caption" style="top: 30%;">
                <h3 style="color: #135E69; font-weight: bold;">Selamat Datang</h3>
                <h1 class="big-text">SD NEGERI GRUGU 03 KAWUNGANTEN</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="sistem/img/profil3.jpeg" alt="Jaringan" class="d-block image"
                style="width:100%; height: 650px; filter: brightness(40%);">
            <div class="carousel-caption caption" style="top: 30%;">
                <h3 style="color: #135E69; font-weight: bold;">Selamat Datang</h3>
                <h1 class="big-text">SD NEGERI GRUGU 03 KAWUNGANTEN</h1>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<div class="container" style="position: relative; top: -80px; z-index: 100;">
    <div class="row">
        <div class="col center-dist" style="background-color: #F4A03A;">
            <h5 style="text-align: right; margin: 113px 30px 50px 65px; color: white;">
                SD NEGERI GRUGU 03 merupakan salah satu satuan pendidikan jenjang Sekolah Dasar Negeri yang beralamat di
                Ajibarang Rt 02 Rw 06, Kelurahan Grugu, Kecamatan Kawunganten, Kab. Cilacap, Provinsi Jawa Tengah. Dalam
                menjalankan kegiatannya, SD NEGERI GRUGU 03 berada di bawah naungan Kementerian Pendidikan dan
                Kebudayaan Republik Indonesia.
            </h5>
        </div>
        <div class="col thrid" style="background-color: #135E69; margin: 0 0 0 -7.5px">
            <img src="sistem/img/profil4.jpeg" style="width:103%; opacity: 0.5; margin: 0 0 0 -7.5px" />
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 center-dist">
            <h1 style="color: #135E69; font-weight: bold;">
                About Us
            </h1>
        </div>
        <div class="col" style="margin: 18px 0 0 -90px;">
            <div class="garis-warna">
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 70px;">
    <div class="row">
        <div class="col">
            <i class="fas fa-chalkboard-teacher fa-4x" style="color: #F4A03A;"></i>
            <h3 style="font-weight: bold; color: #135E69;">TENAGA PENGAJAR</h3>
            <p>Tenaga pengajar terdiri dari sosok-sosok muda yang berbakat, kompeten, handal, dan profesional.</p>
        </div>
        <div class="col">
            <i class="fa fa-university fa-4x" style="color: #F4A03A;"></i>
            <h3 style="font-weight: bold; color: #135E69;">KURIKULUM</h3>
            <p>Kurikulum yang diterapkan adalah Kurikulum Merdeka. Kurikulum Merdeka adalah kurikulum terkini dengan
                pembelajaran intrakurikuler yang beragam.</p>
        </div>
        <div class="col">
            <i class="fa-solid fa-medal fa-4x" style="color: #F4A03A;"></i>
            <h3 style="font-weight: bold; color: #135E69;">AKREDITASI</h3>
            <p>Sekolah telah mendapatkan perigkat akreditasi B (Baik).</p>
        </div>
        <div class="col">
            <i class="fa fa-newspaper-o fa-4x" style="color: #F4A03A;"></i>
            <h3 style="font-weight: bold; color: #135E69;">KEGIATAN</h3>
            <p>SDN Grugu 03 merupakan lembaga pendidikan yang tidak hanya berfokus pada kemampuan berpikir tetapi
                juga
                berfokus pada segala aspek sehingga banyak kegiatan sekolah yang diselenggarakan.</p>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col" style="background-color: #F4A03A;">
            <div class="horizontal-line">
                <h4 style="text-align: left; margin: 30px 30px 0 30px; color: white; font-weight: bold;">Visi</h4>
                <div class="garis"></div>
            </div>
            <h1 style="text-align: right; margin: 70px 30px 30px 65px; color: white; font-weight: bold;">
                Menciptakan siswa yang bertaqwa dalam meraih prestasi dan berkarakter
            </h1>
        </div>
        <div class="col" style="margin-left: -7.5px; background-color: #135E69;">
            <div class="horizontal-line">
                <h4 style="text-align: left; margin: 30px 30px 0 30px; color: white; font-weight: bold;">Misi</h4>
                <div class="garis"></div>
            </div>
            <ol style="text-align: left; margin: 70px 30px 70px 30px; color: white; font-weight: bold;">
                <li>
                    <h5>Meningkatkan ketaqwaan kedalam proses pembelajaran</h5>
                </li>
                <li>
                    <h5>Mengembangkan semangat belajar siswa</h5>
                </li>
                <li>
                    <h5>Mengembangkan inovasi baru dalam kegiatan pembelajaran</h5>
                </li>
                <li>
                    <h5>Menanamkan nilai-nilai kepribadian, kejujuran, kedisiplinan bagi siswa</h5>
                </li>
                <li>
                    <h5>Melayani serta mengedepankan rasa keadilan, solidaritas, toleransi, cinta kasih tanpa membedakan
                        suku, agama serta ras</h5>
                </li>
                <li>
                    <h5>Membina, mengarahkan bakat, keterampilan, prestasi siswa</h5>
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col" style="background-color: #135E69; margin-bottom: 30px;">
            <div class="horizontal-line">
                <h4 style="text-align: right; margin: 30px 30px 0 30px; color: white; font-weight: bold;">Tujuan</h4>
                <div class="garis"></div>
            </div>
            <ol style="text-align: left; margin: 70px 30px 70px 30px; color: white; font-weight: bold;">
                <li>
                    <h5>Meningkatkan ketaqwaan terhadap Tuhan Yang Maha Esa sesuai dengan agama yang dianutnya</h5>
                </li>
                <li>
                    <h5>Meningkatkan kedisiplinan siswa</h5>
                </li>
                <li>
                    <h5>Membentuk siswa yang berprestasi baik akademik maupun non akademik</h5>
                </li>
                <li>
                    <h5>Meningkatkan kepribadian siswa dalam kehidupan bermasyarakat</h5>
                </li>
                <li>
                    <h5>Mensukseskan wajib belajar sembilan tahun bagi siswa</h5>
                </li>
                <li>
                    <h5>Membina bakat, prestasi, serta keterampilan bagi siswa</h5>
                </li>
                <li>
                    <h5>Memgenbangkan prestasi siswa sebagai bakat untuk melanjutkan sekolah ke jenjang yang lebih
                        tinggi</h5>
                </li>
                <li>
                    <h5>Menanamkan rasa keadilan, toleransi, serta kasih pada peserta didik</h5>
                </li>
            </ol>
        </div>
    </div>
</div>


@endsection