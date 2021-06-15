@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah data Outlet</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('komplain.index') }}"> Back</a>
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

<form action="{{ route('komplain.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Jenis Komplain</strong>
                 <select class="form-control m-bot15" name="jenis">
                  
                    <option value="">-</option>
                    <option value="Air">Air</option>
                    <option value="Listrik">Listrik</option>
                    <option value="saluran air">Saluran Air</option>
                    <option value="corong udara">Corong Udara</option>
                    <option value="lainya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
           
        </div>
        <div class="col-md-12">
                <div class="form-group">
                <strong>Rincian Masalah:</strong>
               <textarea class="form-control" name="rincian_masalah"></textarea>
            </div>
        </div>
        
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection