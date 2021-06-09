@extends('template')

@section('content')
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

<form action="<?php echo route('sewa_advertise.update',$sewa_advertise->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >ADVERTIS</span>

    <div class="row">
          <div class="col-md-5">
            <div class="form-group">
                <strong>Nama sewa_advertise</strong>
                <input type="text" name="id_sewa" value="<?php echo $sewa_advertise->id_sewa ?>" class="form-control" placeholder="nama pemilik">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <strong>id_sewa_advertise</strong>
                <input type="text" name="id_sewa_advertise" value="<?php echo $sewa_advertise->id_advertise ?>" class="form-control" placeholder="id_sewa_advertise lokasi">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>tgl_mulai_sewa</strong>
                <input type="text" name="tgl_mulai_sewa" value="<?php echo $sewa_advertise->tgl_mulai_sewa ?>" class="form-control" placeholder="tgl_mulai_sewa lokasi">
            </div>
        </div>
</div>
<div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <strong>lama_sewa</strong>
                                               <input type="number" name="lama_sewa" class="form-control" value="<?php echo $sewa_advertise->lama_sewa ?>"  maxlength="16" placeholder="id_users Sewa / Bulan">

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>id_users</strong>
                <input type="text" name="id_users" class="form-control" value="<?php echo $sewa_advertise->id_users ?>"  maxlength="16" placeholder="Username">
            </div>
        </div>
        

    </div>



<div class="row">
    <div class="col-xs-12  text-center" style="float: right;">
      <a class="btn btn-warning btn-block" href="<?php echo route('sewa_advertise.index') ?>" > Cancel</a><br>
      <button type="submit" class="btn btn-primary btn-block " > Update </button>
  </div>
</div>

</form>
@endsection