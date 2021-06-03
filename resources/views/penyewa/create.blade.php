@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>FORM REGISTRASI PENYEWA</h2>
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

<form action="{{ route('penyewa.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf
     <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS PEMILIK USAHA</span>
   
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Nama pemilik</strong>
                <input type="text" name="nama_pemilik" class="form-control" placeholder="nama pemilik">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>Alamat pemilik</strong>
                <input type="text" name="alamat_pemilik" class="form-control" placeholder="alamat pemilik">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>HP</strong>
                <input type="text" name="hp" class="form-control" placeholder="No Handphone">
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Email</strong>
                <input type="email" name="email" class="form-control" placeholder="nama@gmail.com">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>Ktp</strong>
                <input type="text" name="ktp" class="form-control" maxlength="16" placeholder="16 digit no ktp">
            </div>
        </div>

    </div>
    <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS USAHA</span>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Nama usaha</strong>
                <input type="text" name="nama_usaha" class="form-control" placeholder="nama usaha">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>Alamat usaha</strong>
                <input type="text" name="alamat_usaha" class="form-control" placeholder="alamat usaha">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <strong>Surat Ijin Usaha *jika ada</strong>
                <input type="text" name="no_siup" class="form-control" placeholder="Surat ijin usaha">
            </div>
        </div>
        

    </div>
    <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary btn-sm btn-block">Daftar Sekarang</button>
    </div>
</div>


</form>
@endsection