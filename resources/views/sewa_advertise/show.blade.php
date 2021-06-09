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
            <a class="btn btn-secondary" href="{{ route('') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Atrium/Iklan:</strong>
            {{ $penyewa->id_sewa }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>id_sewa_advertise:</strong>
            {{ $penyewa->id_sewa_advertise}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>tgl_mulai_sewa:</strong>
            {{ $penyewa->tgl_mulai_sewa }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>lama_sewa:</strong>
            {{ $penyewa->lama_sewa }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>lama_sewa:</strong>
            {{ $penyewa->id_users }}
        </div>
    </div>
</div>
@endsection