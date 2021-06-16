

@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Daftar Iklan/Atrium</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('sewa_advertise.create') }}"> Tambah </a>
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
            <th>Nama sewa_advertise</th>
            <th>id_sewa_advertise</th>
            <th>tgl_mulai_sewa</th>
            <th>lama_sewa</th>
            <th>status</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($sewa_advertise as $post)
        <tr>
           <td class="text-center">{{ ++$i }}</td>
           <td>{{ $post->nama_pemilik }}</td>
           <td>{{ $post->nama_advertise }}</td>
           <td>{{ $post->tgl_mulai_sewa }}</td>
           <td>{{ $post->lama_sewa}}</td>
              <td>
                <?php 
                if ($post->status=='0') {
                 ?>
                 <button class="btn btn-warning">Belum</button>
             <?php } else{ ?>
                <button class="btn btn-success">Sudah</button>
            <?php } ?>
        </td>


              <td class="text-center">
                 @if (auth()->user()->level != 2)
                <form action="{{ route('sewa_advertise.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('sewa_advertise.show',$post->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('sewa_advertise.edit',$post->id) }}">Approve</a>

                    @csrf
                    @method('DELETE')

                <!--     <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> -->
                </form>
                  @else

             <a class="btn btn-info btn-sm" href="{{ route('sewa_advertise.show',$post->id) }}">Show</a>

            @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection