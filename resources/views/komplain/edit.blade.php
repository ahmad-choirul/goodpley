@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit Post</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="<?php echo route('komplain.index') ?>"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li><?php echo $error ?></li>
        @endforeach
    </ul>
</div>
@endif

<form action="<?php echo route('komplain.update',$komplain->id) ?>" method="POST"  enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
              <strong>Jenis Komplain:</strong>
              <select class="form-control m-bot15" name="jenis">

                <option value="<?php echo $komplain->jenis ?>"><?php echo $komplain->jenis ?></option>
                <option value="Air">Air</option>
                <option value="Listrik">Listrik</option>
                <option value="saluran air">Saluran Air</option>
                <option value="corong udara">Corong Udara</option>
                <option value="lainya">Lainnya</option>
            </select>

        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Rincian Masalah:</strong>
            <input type="hidden" name="id" value="<?php echo $komplain->id ?>">
            <textarea class="form-control" name="rincian_masalah"><?php echo $komplain->rincian_masalah ?></textarea>
        </div>
    </div>
      <!--   <div class="col-md-6">
           <div class="form-group">
                <strong>Penyewa:</strong>
               <input type= "text" class="form-control" name="id_penyewa" readonly="" value="<?php echo $komplain->id_penyewa ?>">
            </div>
        </div> -->
       <!--  <div class="col-md-6">
            <div class="form-group">
                 <strong>Tennat Relation:</strong>
               <input type="text" name="id_outsourcing" class="form-control" name="id_outsourcing" readonly="" value="<?php echo $komplain->id_outsourcing ?>">
    
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="form-group">
                <strong>Rincian Balasan:</strong>
                <textarea class="form-control" name="rincian_balasan" value="<?php echo $komplain->rincian_balasan ?>" readonly=""></textarea>
            </div>
        </div>
        <div class="col-md-12">
          <strong>Status:</strong>
          <textarea class="form-control" name="status" value="<?php echo $komplain->status?>" readonly=""></textarea>

      </div>
      <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-block">Update</button>
      </div>
  </div>

</form>
@endsection