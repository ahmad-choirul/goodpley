@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah data tagihan</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('tennant.index') }}"> Back</a>
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

<form action="{{ route('tagihan.store') }}" method="POST" enctype="multipart/form-data" >
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
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tgl tagihan</strong>
            <input type="date" name="tgl_tagihan" class="form-control" placeholder="tgl tagihan">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi</strong>
            <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nominal</strong>
            <input type="text" name="nominal" class="form-control" placeholder="Nominal">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bukti Tagihan</strong>
            <input type="file" name="bukti_tagihan" class="form-control" placeholder="Bukti Tagihan">
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Bukti Pembayaran</strong>
            <input type="file" name="bukti_pembayaran" class="form-control" placeholder="Bukti Pembayaran">
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Admin</strong>
            <input type="text" name="id_users" class="form-control" placeholder="Admin">
        </div>
    </div>
     <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status</strong>
            <input type="text" name="status" class="form-control" placeholder="Status">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

</form>
@endsection