@extends('template')    

@section('content')
<div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('komplain.index') ?>"> Back</a>
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

<form action="<?php echo route('komplain.update',$komplain->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <strong>Jenis Komplain:</strong>
              <select class="form-control m-bot15" name="jenis">
                  <option value="<?php echo $komplain->jenis ?>"><?php echo $komplain->jenis ?></option>
                  <option value="Air">Air</option>
                  <option value="Listrik">Listrik</option>
                  <option value="saluran air">Saluran Air</option>
                  <option value="corong udara">Corong Udara</option>
                  <option value="lainya">Lainnya</option>
              </select>

          </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
            <strong>Rincian Masalah:</strong>
            <textarea class="form-control" name="rincian_masalah"><?php echo $komplain->rincian_masalah ?></textarea>  
        </div>
    </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Rincian Balasan:</strong>
                <textarea class="form-control" name="rincian_balasan"><?php echo $komplain->rincian_balasan ?></textarea>
            </div>
        </div>
        <div class="col-md-12">
          <strong>Status:</strong>
            <select class="form-control m-bot15" name="status">
                  <option value="0" <?php echo ( $komplain->status == '0') ? 'selected' : '' ?>>Proses</option>
                  <option value="1" <?php echo ( $komplain->status == '1') ? 'selected' : '' ?>>Selesai</option>
              </select>
      </div>
      <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
      </div>
  </div>

</form>
@endsection