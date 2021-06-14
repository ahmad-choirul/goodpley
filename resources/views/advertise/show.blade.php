@extends('template')

@section('content')

<div class="row">
    <div></div>
</div>
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2> Data Atrium/Iklan</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('advertise.index') ?>"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Atrium/Iklan:</strong>
            {{ $advertise->nama_advertise }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lebar:</strong>
            {{ $advertise->lebar}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Panjang:</strong>
            {{ $advertise->panjang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lantai:</strong>
            {{ $advertise->id_lantai }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis:</strong>
            {{ $advertise->jenis }}
        </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Harga / 6 bulan:</strong>
            {{ $advertise->harga }}
        </div>
  </div>
</div>
@endsection