@extends('template')

@section('content')
  <div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
      <div class="float-left">
        <h2>Form Bayar</h2>
      </div>
      <div class="float-right">
        <a class="btn btn-secondary" href="<?php echo route('tagihan.index'); ?>">
          Back</a>
      </div>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li><?php echo $error; ?></li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="<?php echo route('tagihan.bayar', $tagihan->id); ?>" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nominal</strong>
          <input type="text" name="nominal" value="<?php echo $tagihan->nominal; ?>"
            class="form-control" placeholder="Nominal" readonly>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Bukti Pembayaran</strong>
          <img src=" {{ asset('storage/images/' . $tagihan->bukti_pembayaran) }}" class="img-thumbnail"
            style="max-width: 200px; max-height: 100px;">
          <input type="file" name="bukti_pembayaran" class="form-control" placeholder="Gambar">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Tgl Bayar</strong>
          <input type="text" name="tgl_pembayaran" value="<?php echo date('Y-m-d'); ?>"
            class="form-control" placeholder="Admin">
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Bayar</button>
      </div>
    </div>

  </form>
@endsection
