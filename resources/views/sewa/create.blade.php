@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>FORM SEWA OUTLET</h2>
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

<form action="{{ route('sewa.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf
     <span class="btn btn-info " style="border-radius: 6px;max-height: 30px; font-size: 12px;" >IDENTITAS PEMILIK USAHA</span>
   
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <strong>Tgl Sewa</strong>
                <input type="date" name="tgl_sewa" class="form-control" placeholder="TGL Sewa">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>Penyewa</strong>
                 <select class="form-control m-bot15" name="id_penyewa">
                    <option value="">Pilih Usaha</option>
                    @foreach ($penyewas as $penyewa)
                    <option value="<?php echo $penyewa->id ?>" ><?php echo $penyewa->nama_pemilik ?></option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <strong>Outlet</strong>
                <!-- <input type="text" name="id_tennant" class="form-control" placeholder="NAma Tennant"> -->
                
                 <select class="form-control m-bot15" name="id_tennant" name="id_tennant">
                    <option value="">Pilih Outlet</option>
                    @foreach ($tennants as $tennant)
                    <option value="<?php echo $tennant->id ?>" ><?php echo $tennant->nama_tennant ?> | <?php echo $tennant->harga ?></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <strong>TGL Awal Sewa</strong>
                <input type="date" name="tgl_awal_sewa" class="form-control" maxlength="16" placeholder="TGL Awal Sewa">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <strong>TGL Akhir Sewa</strong>
                <input type="date" name="tgl_akhir_sewa" class="form-control" maxlength="16" placeholder="TGL Akhir Sewa">
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