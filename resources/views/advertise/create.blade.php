@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Data Iklan/Atrium</h2>
        </div>
       <!--  <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('tennant.index') }}"> Back</a>
        </div> -->
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('advertise.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf
     
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Advertise</strong>
                <input type="text" name="nama_advertise" class="form-control" placeholder="nama advertise">
            </div>
        </div>

        

    </div>
     <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <strong>lebar (cm)</strong>
                <input type="number" name="lebar" class="form-control" placeholder="lebar lokasi">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Panjang (cm)</strong>
                <input type="number" name="panjang" class="form-control" placeholder="Panjang lokasi">
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="col-md-5">
             <div class="form-group">
                <strong>Lantai</strong>
                <select class="form-control m-bot15" name="id_lantai">
                    <option value="">Pilih Lantai</option>
                    @foreach ($lantais as $lantai)
                    <option value="{{ $lantai->id }}">{{ $lantai->nama_lantai }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Jenis</strong>
                <select name="jenis" class="form-control">
                    <option>Atrium</option>
                    <option>Eskalator</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="text" name="harga" class="form-control" maxlength="16" placeholder="Harga Sewa / Bulan">
            </div>
        </div>
        

    </div>
    <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar tempat iklan / Atrium</strong>
                <input type="file" name="gambar" class="form-control" placeholder="Gambar">
            </div>
        </div>
    </div>
 

    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah Data</button>
    </div>
</div>


</form>
@endsection