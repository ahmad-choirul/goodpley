@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Daftar Nama Lantai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('lantai.create') }}"> Tambah Lantai</a>
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
            <th>Nama Lantai</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($Lantai as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_lantai }}</td>
            <td class="text-center">
                <form action="{{ route('lantai.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('lantai.show',$post->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('lantai.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $Lantai->links() !!}
 
@endsection