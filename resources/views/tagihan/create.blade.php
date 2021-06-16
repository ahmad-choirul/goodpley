@extends('template')

@section('content')
  <div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
      <div class="float-left">
        <h2>Tambah data tagihan</h2>
      </div>
      <div class="float-right">
        <a class="btn btn-secondary" href="{{ route('tagihan.index') }}"> Back</a>
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

  <form action="{{ route('tagihan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nama Outlet</strong>
          <select class="form-control m-bot15" name="id_penyewa">
            <option value="">Pilih Outlet</option>
            @foreach ($penyewa as $penyewa)
              <option value="{{ $penyewa->id }}">{{ $penyewa->nama_usaha }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Jenis</strong>
          <select class="form-control m-bot15" name="jenis_tagihan">
            <option value="">Pili</option>
            <option>PLN</option>
            <option>PDAM</option>
            <option>SEWA</option>
          </select>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Tgl tagihan</strong>
          <input type="date" name="tgl_tagihan" class="form-control" placeholder="tgl tagihan"
            value="{{ old('tgl_tagihan') }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Deskripsi</strong>
          <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi"
            value="{{ old('deskripsi') }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Nominal</strong>
          <input type="text" name="nominal" class="form-control" placeholder="Nominal" value="{{ old('nominal') }}">
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Bukti Tagihan</strong>
          <input type="file" name="bukti_tagihan" class="form-control" placeholder="Bukti Tagihan">
        </div>
      </div>
      @if (auth()->user()->level != 4)
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Bukti Pembayaran</strong>
            <input type="file" name="bukti_pembayaran" class="form-control" placeholder="Bukti Pembayaran">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Tgl pembayaran</strong>
            <input type="date" name="tgl_pembayaran" class="form-control" placeholder="tgl pembayaran"
              value="{{ old('tgl_pembayaran') ?? date('Y-m-d') }}">
          </div>
        </div>
      @endif
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Admin</strong>
          <input type="text" name="id_users" class="form-control" placeholder="Admin"
            value="{{ old('id_users') ?? auth()->user()->id }}" readonly>
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Status</strong>
          <select class="form-control m-bot15" name="status">
            <option>pilih</option>
            <option value="0">Belum</option>
            <option value="1">Terbayar</option>
          </select>

        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </form>
@endsection
