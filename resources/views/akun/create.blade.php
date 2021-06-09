@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>FORM REGISTRASI akun</h2>
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

<form action="{{ route('akun.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf
     <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS PEMILIK USAHA</span>
   
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Username</strong>
                <input type="text" name="email" class="form-control" placeholder="nama pemilik">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>email</strong>
                <input type="text" name="email" class="form-control" placeholder="alamat pemilik">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>level</strong>
                <select class="form-control select2">
                    <option>Pilih level</option>
                    <option>akun</option>
                    <option>Marketing</option>
                    <option>Administrasi</option>
                    <option>Outsourcing</option>
                </select>
            </div>
        </div>
        

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Password</strong>
                <input type="password" name="password" class="form-control" minlength="8" placeholder="password">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>Re-type Password</strong>
                <input type="password" name="repassword" class="form-control" minlength="8" placeholder="tulis ulang password">
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