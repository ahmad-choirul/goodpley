@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Daftar Nama akun</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('akun.create') }}"> Tambah akun</a>
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
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($akun as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $post->email }}</td>
            <td><?php if ($post->level=='1'){ ?>
                ADMIN
            <?php }elseif($post->level=='2'){ ?>
                PENYEWA
            <?php }elseif($post->level=='3'){ ?>
                MARKETING
            <?php }elseif($post->level=='4'){ ?>
                ADMINISTRASI
            <?php }elseif($post->level=='5'){ ?>
                OUTSOURCING
<?php } ?>

            </td>
            
            <td class="text-center">
                <form action="{{ route('akun.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('akun.show',$post->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('akun.edit',$post->id) }}">Edit</a>

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