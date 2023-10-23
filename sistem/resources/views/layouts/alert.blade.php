@if (Session::has('sukses'))
<div class="col-md-6">
    <div id="alert" class="alert alert-success" style="width:300px; right:36px; top:60px; cursor:auto; opacity:1; position:fixed; z-index: 1060;display:block !important">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
    <span class="fa fa-check"></span> <strong>Sukses</strong>
    <hr class="messege-inner-seperator">
    <p>{{Session::get('sukses')}}</p>
    </div>
</div>
@elseif (Session::has('gagal'))
<div class="col-md-6">
    <div id="alert" class="alert alert-danger" style="width:300px;right:36px;top:60px; cursor:auto;opacity:1;position:fixed;z-index:1060;display block !important; transition:visibilitu 0s 2s, opacity 2s linear">
    <audio controls autoplay style="display:none" src="">
        <source src=".../sound.ogg" type="audio/ogg">
        <source src=".../sound.mp3" type="audio/mpeg">
    </audio>   
    <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">x</button> 
    <span class="fa fa-times"></span> <strong>Terjadi Kesalahan</strong>
    <hr class="message-inner-separator">
    <p>{{Session::get('gagal')}}</p>
</div>
</div>
@endif