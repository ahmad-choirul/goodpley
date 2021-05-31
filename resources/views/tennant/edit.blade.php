@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('tennant.index') ?>"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li><?php echo $error ?></li>
        @endforeach
    </ul>
</div>
@endif

<form action="<?php echo route('tennant.update',$tennant->id) ?>" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Tennant:</strong>
                <input type="text" name="nama_tennant" value="<?php echo $tennant->nama_tennant ?>" class="form-control" placeholder="Nama Tennant">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lantai:</strong>
                <!-- <input type="text" name="id_lantai" value="<?php echo $tennant->id_lantai ?>" class="form-control" placeholder="id_lantai"> -->
                <select class="form-control m-bot15" name="id_lantai">
                    <option value="">Pilih Lantai</option>
                    @foreach ($lantais as $lantai)
                    <option value="<?php echo $lantai->id ?>" <?php echo ( $tennant->id_lantai == $lantai->id) ? 'selected' : '' ?> ><?php echo $lantai->nama_lantai ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori: <?php echo $tennant->id_kategori ?></strong>
                <select class="form-control m-bot15" name="id_kategori">
                    <option value="">Pilih kategori</option>
                    @foreach ($kategoris as $kategori)
                    <option value="<?php echo $kategori->id ?>"   <?php echo ( $kategori->id == $tennant->id_kategori) ? 'selected' : ''  ?>><?php echo $kategori->nama_kategori ?></option>
                    @endforeach
                </select>
                <!-- <input type="text" name="id_kategori" value="<?php echo $tennant->id_kategori ?>" class="form-control" placeholder="id_kategori"> -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>panjang:</strong>
                <input type="text" name="panjang" value="<?php echo $tennant->panjang ?>" class="form-control" placeholder="panjang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>lebar:</strong>
                <input type="text" name="lebar" value="<?php echo $tennant->lebar ?>" class="form-control" placeholder="lebar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gambar:</strong>
                <input type="text" name="gambar" value="<?php echo $tennant->gambar ?>" class="form-control" placeholder="gambar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="text" name="harga" value="<?php echo $tennant->harga ?>" class="form-control" placeholder="harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </div>

</form>
@endsection