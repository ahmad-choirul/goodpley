@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
       <!--  <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('akun.index') ?>"> Back</a>
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

<form action="<?php echo route('akun.update',$akun->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="name" value="<?php echo $akun->name ?>" class="form-control" placeholder="Username">
                <input type="hidden" name="id" value="<?php echo $akun->id ?>" class="form-control" placeholder="Nama pemilik">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                <input type="email" name="email" value="<?php echo $akun->email ?>" class="form-control" placeholder="email">
            </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>level:</strong>
            <input type="text" maxlength="16" value="<?php echo $akun->level ?>"  name="level" class="form-control" placeholder="level">

        </div>
    </div>
   

    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="float: right;">
      <a class="btn btn-warning btn-block" href="<?php echo route('akun.index') ?>" > Cancel</a><br>
      <button type="submit" class="btn btn-primary btn-block " > Update </button>
  </div>
</div>

</form>
@endsection