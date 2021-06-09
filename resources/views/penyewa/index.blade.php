@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Daftar Nama Usaha</h2>
        </div>
         <div class="float-right">
            <a class="btn btn-success" href="{{ route('penyewa.create') }}"> Tambah Usaha</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="table"> 
    <table class="table-responsive " style="white-space: nowrap; ">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Pemilik</th>
            <th>Alamat</th>
            <th>Hp</th>
            <th>Ktp</th>
            <th>Nama usaha</th>
            <th>SIUP</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($penyewa as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
        
                <td>{{ $post->nama_pemilik }}</td>
                <td>{{ $post->alamat_pemilik }}</td>
                <td>{{ $post->hp }}</td>
                <td>{{ $post->ktp }}</td>
                <td>{{ $post->nama_usaha }}</td>
                <td>{{ $post->no_siup }}</td>
                <td class="text-center">
                    <form action="{{ route('penyewa.destroy',$post->id) }}" method="POST">

                        <a class="btn btn-info btn-sm" href="{{ route('penyewa.show',$post->id) }}">Show</a>

                        <a class="btn btn-primary btn-sm" href="{{ route('penyewa.edit',$post->id) }}">Edit</a>

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