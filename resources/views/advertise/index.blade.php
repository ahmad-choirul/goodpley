

@extends('template')

@section('content')

<div class="row"></div>
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Daftar Iklan/Atrium</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('advertise.create') }}"> Tambah </a>
        </div>
    </div>
    
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="table"> 
    <table class="table-responsive " style="white-space: nowrap; width: 100%;">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Advertise</th>
            <th>Lebar</th>
            <th>Panjang</th>
            <th>Lantai</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($advertise as $post)
        <tr>
           <td class="text-center">{{ ++$i }}</td>
           <td>{{ $post->nama_advertise }}</td>
           <td>{{ $post->lebar }}</td>
           <td>{{ $post->panjang }}</td>
           <td>{{ $post->id_lantai}}</td>
           <td>
            <?php if ($post->jenis=='1'){ ?>
                ATRIUM
            <?php } elseif($post->jenis=='2'){ ?>
              ESKALATOR
              <?php }  ?></td>
              <td>{{ $post->harga}}</td>
            <td><img src=" {{ asset('storage/images/'.$post->gambar) }}" width="100px"> </td>


              <td class="text-center">
                <form action="{{ route('advertise.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('advertise.show',$post->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('advertise.edit',$post->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection