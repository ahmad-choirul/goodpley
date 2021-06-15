@extends('template')
 
@section('content')

    <div class="row">
        <div></div>
    </div>
    <div class="row mt-5 mb-5">
        <br>
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Post</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('lantai.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Lantai:</strong>
                {{ $Lantai->nama_lantai }}
            </div>
        </div>
    </div>
@endsection