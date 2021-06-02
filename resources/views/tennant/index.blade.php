@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Nama tennant</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('tennant.create') }}"> Tambah Tennant</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama tennant</th>
            <th>Lantai</th>
            <th>Kategori</th>
            <th>Lebar</th>
            <th>Panjang</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($tennant as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_tennant }}</td>
            <td>{{ $post->nama_lantai }}</td>
            <td>{{ $post->nama_kategori }}</td>
            <td>{{ $post->lebar }}</td>
            <td>{{ $post->panjang }}</td>
            <td>{{ $post->harga }}</td>
            <td><img src=" {{ asset('storage/images/'.$post->gambar) }}" width="100px"> </td>
            <td class="text-center">
                <form action="{{ route('tennant.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('tennant.show',$post->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('tennant.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
 
@endsection