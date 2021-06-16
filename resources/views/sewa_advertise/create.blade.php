@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Data Iklan/Atrium</h2>
        </div>
       <!--  <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('tennant.index') }}"> Back</a>
        </div> -->
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

<form action="{{ route('sewa_advertise.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <strong>Nama Sewa</strong>
            <div class="form-group">

                <select class="form-control m-bot15" name="id_sewa">
                    @foreach ($sewas as $sewa)
                    <option value="{{ $sewa->id }}">{{ $sewa->nama_pemilik }} / {{ $sewa->nama_tennant }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        

    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <strong>advertise</strong>
                <select class="form-control m-bot15" name="id_advertise">
                    @foreach ($advertise as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_advertise }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>tgl mulai sewa</strong>
                <input type="date" name="tgl_mulai_sewa" class="form-control" placeholder="tgl_mulai_sewa">
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="col-md-5">
           <div class="form-group">
            <strong>lama_sewa</strong>
            <input type="number" name="lama_sewa" class="form-control" maxlength="16" placeholder="lama Sewa / Bulan">

        </div>
    </div>
    <input type="hidden" name="id_users" value="0" class="form-control" maxlength="16" placeholder="Lama Sewa / Bulan">



</div>

<div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah Data</button>
</div>
</div>


</form>
@endsection