@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah data Plaza</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('tennant.index') }}"> Back</a>
        </div>
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

<form action="{{ route('tennant.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama plaza</strong>
                <input type="text" name="nama_tennant" class="form-control" placeholder="nama tennant">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <!-- <input type="text" name="id_kategori" class="form-control" placeholder="Kategori"> -->
                <select class="form-control m-bot15" name="id_kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lebar</strong>
                <input type="text" name="lebar" class="form-control" placeholder="Lebar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Panjang</strong>
                <input type="text" name="panjang" class="form-control" placeholder="Panjang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar</strong>
                <input type="file" name="gambar" class="form-control" placeholder="Gambar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="text" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection