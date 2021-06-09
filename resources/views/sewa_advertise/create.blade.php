@extends('template')

@section('content')
<div class="row mt-5 mb-5">
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
            <div class="form-group">
                <strong>Nama Sewa</strong>
                <!-- <input type="text" name="id_sewa" class="form-control" placeholder="nama sewa_advertise"> -->
              <select class="form-control m-bot15" name="id_sewa">
                    @foreach ($sewas as $sewa)
                    <option value="{{ $sewa->id }}">{{ $sewa->nama_pemilik }} / {{ $sewa->nama_tennant }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        

    </div>
     <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <strong>advertise</strong>
                <input type="number" name="id_advertise" class="form-control" placeholder="id_advertise">
            </div>
        </div>
        <div class="col-md-6">
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
                               <input type="number" name="lama_sewa" class="form-control" maxlength="16" placeholder="id_users Sewa / Bulan">

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>id_users</strong>
                <input type="text" name="id_users" class="form-control" maxlength="16" placeholder="id_users Sewa / Bulan">
            </div>
        </div>
        

    </div>

    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-sm btn-block">Tambah Data</button>
    </div>
</div>


</form>
@endsection