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
            {{ $penyewa->nama_advertise }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lebar:</strong>
            {{ $penyewa->lebar}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Panjang:</strong>
            {{ $penyewa->panjang }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Lantai:</strong>
            {{ $penyewa->lantai }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis:</strong>
            <?php if ($post->jenis=='1'){ ?>
                ATRIUM
            <?php } elseif($post->jenis=='2'){ ?>
              ESKALATOR
          <?php }  ?>
      </div>
  </div>
</div>
@endsection