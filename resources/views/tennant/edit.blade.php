@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
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

<form action="{{ route('tennant.update',$tennant->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Tennant:</strong>
                <input type="text" name="nama_tennant" value="{{ $tennant->nama_tennant }}" class="form-control" placeholder="Nama Tennant">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lantai:</strong>
                <!-- <input type="text" name="id_lantai" value="{{ $tennant->id_lantai }}" class="form-control" placeholder="id_lantai"> -->
                <select class="form-control m-bot15" name="id_lantai">
                    <option value="">Pilih Lantai</option>
                    @foreach ($lantais as $lantai)
                    <option value="{{ $lantai->id }" <?php echo ( $tennant->id_lantai == $lantai->id) ? 'selected' : '' ?> >{{ $lantai->nama_lantai }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori: {{ $tennant->id_kategori}}</strong>
                <select class="form-control m-bot15" name="id_lantai">
                    <option value="">Pilih kategori</option>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"   <?php echo ( $kategori->id == $tennant->id_lantai) ? 'selected' : ''  ?>>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                <!-- <input type="text" name="id_kategori" value="{{ $tennant->id_kategori }}" class="form-control" placeholder="id_kategori"> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>panjang:</strong>
                <input type="text" name="panjang" value="{{ $tennant->panjang }}" class="form-control" placeholder="panjang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>lebar:</strong>
                <input type="text" name="lebar" value="{{ $tennant->lebar }}" class="form-control" placeholder="lebar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gambar:</strong>
                <input type="text" name="gambar" value="{{ $tennant->gambar }}" class="form-control" placeholder="gambar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </div>

</form>
@endsection