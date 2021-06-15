@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <br>
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Nama kategori</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Tambah Kategori</a>
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
            <th>Nama kategori</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($kategori as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_kategori }}</td>
            <td class="text-center">
                <form action="{{ route('kategori.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('kategori.show',$post->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kategori->links() !!}
 
@endsection