@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
       <!--  <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('sewa.index') ?>"> Back</a>
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

<form action="<?php echo route('sewa.update',$sewa->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Swa:</strong>
                <input type="text" name="tgl_sewa" value="<?php echo $sewa->tgl_sewa ?>" class="form-control" placeholder="Nama pemilik">
                <input type="hidden" name="id" value="<?php echo $sewa->id ?>" class="form-control" placeholder="Nama pemilik">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Penyewa:</strong>
                <!-- <input type="text" name="id_lantai" value="<?php echo $sewa->id_lantai ?>" class="form-control" placeholder="id_lantai"> -->
                <!-- <input type="text" name="id_penyewa" value="<?php echo $sewa->id_penyewa ?>" class="form-control" placeholder="Alamat pemilik"> -->
                <select class="form-control m-bot15" name="id_penyewa">
                    @foreach ($users as $penyewa)
                    <option value="<?php echo $penyewa->id ?>" <?php echo ( $sewa->id_penyewa == $penyewa->id) ? 'selected' : '' ?> ><?php echo $penyewa->nama_pemilik ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tennant:</strong>
                <!-- <input type="text" name="id_tennant" value="<?php echo $sewa->id_tennant ?>" class="form-control" placeholder="id_tennant"> -->
                <select class="form-control m-bot15" name="id_tennant">
                    <option value="">Pilih Tennant</option>
                    @foreach ($tennants as $tennant)
                    <option value="<?php echo $tennant->id ?>" <?php echo ( $sewa->id_tennant == $tennant->id) ? 'selected' : '' ?> ><?php echo $tennant->nama_tennant ?></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>biaya:</strong>
                <input type="biaya" name="biaya" value="<?php echo $sewa->biaya ?>" class="form-control" placeholder="biaya">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tgl_awal_sewa:</strong>
                <input type="date" maxlength="16" value="<?php echo $sewa->tgl_awal_sewa ?>"  name="tgl_awal_sewa" class="form-control" placeholder="tgl_awal_sewa">

            </div>
            <div class="form-group">
                <strong>tgl_akhir_sewa:</strong>
                <input type="date" maxlength="16" value="<?php echo $sewa->tgl_akhir_sewa ?>"  name="tgl_akhir_sewa" class="form-control" placeholder="tgl_awal_sewa">

            </div>
            <?php $level=auth()->user()->level; if ($level=='1'){ ?>

                <div class="form-group">
                    <strong>Status:</strong>
                    <!-- <input type="text" name="id_lantai" value="<?php echo $sewa->id_lantai ?>" class="form-control" placeholder="id_lantai"> -->
                    <!-- <input type="text" name="id_penyewa" value="<?php echo $sewa->id_penyewa ?>" class="form-control" placeholder="Alamat pemilik"> -->
                    <select class="form-control m-bot15" name="status">
                        <option value="">Pilih Status</option>
                        <option value="0" <?php echo ( $sewa->status == '0') ? 'selected' : '' ?> >Belum Bayar</option>
                        <option value="1" <?php echo ( $sewa->status == '1') ? 'selected' : '' ?> >Sudah Disetujui</option>
                    </select>
                </div>
                <?php }else{ ?>
                <input type="hidden" maxlength="16" value="<?php echo $sewa->status ?>"  name="status" class="form-control" placeholder="tgl_awal_sewa">
<?php } ?>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="float: right;">
                  <a class="btn btn-warning btn-block" href="<?php echo route('sewa.index') ?>" > Cancel</a><br>
                  <button type="submit" class="btn btn-primary btn-block " > Update </button>
              </div>
          </div>

      </form>
      @endsection