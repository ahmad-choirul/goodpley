@extends('template')

@section('content')
  <div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
      <div class="float-left">
        <h2>Edit Post</h2>
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

  <form action="<?php echo route('tagihan.update', $tagihan->id); ?>" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nama Outlet</strong>
          <select class="form-control m-bot15" name="id_penyewa">
            <option value="">Pilih penyewa</option>
            @foreach ($penyewas as $penyewa)
              <option value="<?php echo $penyewa->id; ?>" <?php echo
                $tagihan->id_sewa == $penyewa->id ? 'selected' : ''; ?>><?php echo
                $penyewa->nama_usaha; ?></option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Jenis: <?php echo $tagihan->jenis_tagihan; ?></strong>
          <select class="form-control m-bot15" name="jenis_tagihan">
            <option value="">Pili</option>
            <option @if ($tagihan->jenis_tagihan === 'PLN') selected @endif>
              PLN</option>
            <option @if ($tagihan->jenis_tagihan === 'PDAM') selected @endif>PDAM</option>
            <option @if ($tagihan->jenis_tagihan === 'SEWA') selected @endif>SEWA</option>
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Tgl tagihan</strong>
          <input type="date" name="tgl_tagihan" class="form-control"
            value="<?php echo $tagihan->tgl_tagihan; ?>" placeholder="tgl tagihan">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Deskripsi</strong>
          <input type="text" name="deskripsi" value="<?php echo $tagihan->deskripsi; ?>"
            class="form-control" placeholder="deskripsi">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nominal</strong>
          <input type="text" name="nominal" value="<?php echo $tagihan->nominal; ?>"
            class="form-control" placeholder="Nominal">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Bukti Tagihan</strong>
          <img src=" {{ asset('storage/images/' . $tagihan->bukti_tagihan) }}" class="img-thumbnail"
            style="max-width: 200px; max-height: 100px;">
          <input type="file" name="gambar" class="form-control" placeholder="Gambar">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Bukti Pembayaran</strong>
          <img src=" {{ asset('storage/images/' . $tagihan->bukti_pembayaran) }}" class="img-thumbnail"
            style="max-width: 200px; max-height: 100px;">
          <input type="file" name="gambar" class="form-control" placeholder="Gambar">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Tgl Bayar</strong>
          <input type="text" name="tgl_pembayaran" value="<?php echo date('Y-m-d'); ?>"
            class="form-control" placeholder="Admin">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Admin</strong>
          <input type="text" name="id_users" value="<?php echo $tagihan->id_users; ?>"
            class="form-control" placeholder="Admin">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Status</strong>
          <select class="form-control m-bot15" name="status">
            <option>pilih</option>
            <option @if ($tagihan->status == '0') selected @endif value="0">
              Belum</option>
            <option @if ($tagihan->status === '1') selected @endif
              value="1">Terbayar</option>
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>

  </form>
@endsection
