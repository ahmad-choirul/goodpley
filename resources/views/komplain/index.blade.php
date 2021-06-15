@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <br>
        <div class="col-lg-12 margin-tb">
            <br>
            <div class="float-right">
                <h2>Daftar Komplain</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('komplain.create') }}"> Tambah Komplain</a>
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
            <th>Jenis Komplain</th>
            <th>Rincian Masalah</th>
            <th>Penyewa</th>
            <th>TR</th>
            <th>Balasan</th>
            <th>Status</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($komplain as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->jenis }}</td>
            <td>{{ $post->rincian_masalah }}</td>
             <td>{{ $post->id_penyewa }}</td>
            <td>{{ $post->id_outsourcing}}</td>
            <td>{{ $post->rincian_balasan }}</td>
            <td>{{ $post->status }}</td>
            <td class="text-center">
                <form action="{{ route('komplain.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('komplain.show',$post->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('komplain.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
 
@endsection