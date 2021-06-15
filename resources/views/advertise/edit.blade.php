 @extends('template')

@section('content')
<br>
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
       <!--  <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('penyewa.index') ?>"> Back</a>
        </div> -->
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

<form action="<?php echo route('advertise.update',$advertise->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >ADVERTIS</span>

    <div class="row">
          <div class="col-md-5">
            <div class="form-group">
                <strong>Nama Advertise</strong>
                <input type="text" name="nama_advertise" value="<?php echo $advertise->nama_advertise ?>" class="form-control" placeholder="nama pemilik">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <strong>lebar</strong>
                <input type="text" name="lebar" value="<?php echo $advertise->lebar ?>" class="form-control" placeholder="lebar lokasi">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Panjang</strong>
                <input type="text" name="panjang" value="<?php echo $advertise->panjang ?>" class="form-control" placeholder="Panjang lokasi">
            </div>
        </div>
</div>
<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <strong>Lantai</strong>
                <select class="form-control m-bot15" name="id_lantai">
                    <option value="">Pilih Lantai</option>
                    @foreach ($lantais as $lantai)
                    <option value="<?php echo $lantai->id ?>" <?php echo ( $advertise->id_lantai == $lantai->id) ? 'selected' : '' ?> ><?php echo $lantai->nama_lantai ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Jenis</strong>
                <select name="jenis" class="form-control">
                    <option value="1" <?php echo ($advertise->jenis == '1') ? 'selected' : ''; ?>>Atrium</option>
                    <option value="2" <?php echo ($advertise->jenis == '2') ? 'selected' : ''; ?>>Eskalator</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="text" name="harga" class="form-control" value="<?php echo $advertise->harga ?>"  maxlength="16" placeholder="Username">
            </div>
        </div>
        

    </div>



<div class="row">
    <div class="col-xs-12  text-center" style="float: right;">
      <a class="btn btn-warning btn-block" href="<?php echo route('advertise.index') ?>" > Cancel</a><br>
      <button type="submit" class="btn btn-primary btn-block " > Update </button>
  </div>
</div>

</form>
@endsection