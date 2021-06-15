@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
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

<form action="<?php echo route('penyewa.update',$penyewa->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')
    <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS PEMILIK USAHA</span>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Nama Pemilik:</strong>
                <input type="text" name="nama_pemilik" value="<?php echo $penyewa->nama_pemilik ?>" class="form-control" placeholder="Nama pemilik">
                <input type="hidden" name="id" value="<?php echo $penyewa->id ?>" class="form-control" placeholder="Nama pemilik">
            </div>
        </div>
        <div class="col-md-5">
           <div class="form-group">
            <strong>Alamat Pemilik:</strong>
            <input type="text" name="alamat_pemilik" value="<?php echo $penyewa->alamat_pemilik ?>" class="form-control" placeholder="Alamat pemilik">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <strong>HP:</strong>
            <input type="text" name="hp" value="<?php echo $penyewa->hp ?>" class="form-control" placeholder="HP">
        </div>
    </div>
</div>
<span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS USAHA</span>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <strong>KTP</strong>
            <input type="text" maxlength="16" minlength="16" value="<?php echo $penyewa->ktp ?>"  name="ktp" class="form-control" placeholder="ktp">

        </div>
    </div>
    <div class="col-md-3">
       <div class="form-group">
            <strong>Nama Usaha:</strong>
            <input type="text" name="nama_usaha" value="<?php echo $penyewa->nama_usaha?>" class="form-control" placeholder="nama_usaha">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <strong>Alamat Usaha:</strong>
            <input type="text" name="alamat_usaha" value="<?php echo $penyewa->alamat_usaha?>" class="form-control" placeholder="alamat_usaha">
        </div>
    </div>
    <div class="col-md-3">
       <div class="form-group">
            <strong>Surat Ijin Usaha:</strong>
            <input type="text" name="no_siup" value="<?php echo $penyewa->no_siup?>" class="form-control" placeholder="no_siup">
        </div>
    </div>


</div>
<span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >DETAIL AKUN PENYEWA</span>

<div class="row">
    <div class="col-md-4">
       <div class="form-group">
        <strong>Username:</strong>
        <input type="text" name="name" value="<?php echo $penyewa->name ?>" class="form-control" placeholder="Nama pemilik">
    </div>
</div>
<div class="col-md-5">
  <div class="form-group">
    <strong>email:</strong>
    <input type="email" name="email" value="<?php echo $penyewa->email ?>" class="form-control" placeholder="email">
</div>
</div>
<div class="col-md-3">
 <?php $level = auth()->user()->level; if ($level=='1'): ?>
       <div class="form-group">
    <strong>Level: <?php echo $penyewa->level ?></strong>
    <select class="form-control select2" name="level">
     <option>Pilih level</option>
     <option value="2" <?php echo ($penyewa->level == '1') ? 'selected' : ''; ?>>Admin</option>
     <option value="2" <?php echo ($penyewa->level == '2') ? 'selected' : ''; ?>>Penyewa</option>
     <option value="3" <?php echo ($penyewa->level == '3') ? 'selected' : ''; ?>>Marketing</option>
     <option value="4" <?php echo ($penyewa->level == '4') ? 'selected' : ''; ?>>Administrasi</option>
     <option value="5" <?php echo ($penyewa->level == '5') ? 'selected' : ''; ?>>Outsourcing</option>
 </select>
</div>
<?php else: ?>
    <?php 
if ($level=='1') {
    $txtlevel='ADMIN';
}
if ($level=='2') {
    $txtlevel='PENYEWA';
}
if ($level=='3') {
    $txtlevel='MARKETING';
}
if ($level=='4') {
    $txtlevel='ADMINISTRASI';
}
if ($level=='5') {
    $txtlevel='OUTSOURCING';
}
     ?>
    <strong>level:</strong>

    <input type="hidden" name="level" value="<?php echo $penyewa->level ?>" class="form-control" placeholder="email">
    <input type="text" readonly value="<?php echo $txtlevel ?>" class="form-control" placeholder="email">

 <?php endif ?>
</div>
</div>





<div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="float: right;">
      <a class="btn btn-warning btn-block" href="<?php echo route('penyewa.index') ?>" > Cancel</a><br>
      <button type="submit" class="btn btn-primary btn-block " > Update </button>
  </div>
</div>

</form>
@endsection