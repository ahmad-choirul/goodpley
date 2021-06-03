@extends('template')
 
@section('content')

    <div class="row">
        <div></div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Data Penyewa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('penyewa.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pemilik:</strong>
                {{ $penyewa->nama_pemilik }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat pemilik:</strong>
                {{ $penyewa->alamat_pemilik }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No hp:</strong>
                {{ $penyewa->hp }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                {{ $penyewa->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>KTP:</strong>
                {{ $penyewa->ktp }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Usaha:</strong>
                {{ $penyewa->nama_usaha }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Usaha:</strong>
                {{ $penyewa->alamat_usaha }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surat Ijin Usaha:</strong>
                {{ $penyewa->no_siup }}
            </div>
        </div>
    </div>
@endsection