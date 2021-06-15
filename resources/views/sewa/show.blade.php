@extends('template')
 
@section('content')

    <div class="row">
        <div></div>
    </div>
    <div class="row mt-5 mb-5">
        <br>
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Detail Data sewa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('sewa.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pemilik:</strong>
                {{ $sewa->tgl_sewa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat pemilik:</strong>
                {{ $sewa->id_penyewa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No id_tennant:</strong>
                {{ $sewa->id_tennant }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>biaya</strong>
                {{ $sewa->biaya }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tgl_awal_sewa:</strong>
                {{ $sewa->tgl_awal_sewa }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Usaha:</strong>
                {{ $sewa->tgl_akhir_sewa }}
            </div>
        </div>
    </div>
@endsection