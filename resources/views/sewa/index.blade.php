@extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <br>
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Daftar Nama sewa</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('sewa.create') }}"> Tambah sewa</a>
        </div>
    </div>
    
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('fail'))
<div class="alert alert-warning">
    <p>{{ $message }}</p>
</div>
@endif
<div class="table"> 
    <table class="table-responsive " style="white-space: nowrap; ">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Tanggal Sewa</th>
            <th>Penyewa</th>
            <th>Tennant</th>
            <th>Tanggal Awal Sewa</th>
            <th>Tanggal Akhir Sewa</th>
            <th>Status Sewa</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($sewa as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->tgl_sewa }}</td>
            <td>{{ $post->nama_pemilik }}</td>
            <td>{{ $post->nama_tennant }}</td>
            <td>{{ $post->tgl_awal_sewa }}</td>
            <td>{{ $post->tgl_akhir_sewa }}</td>
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
            <?php if (  $post->status=='1'): ?>
                <a class="btn btn-success btn-sm" href="{{ route('sewa_advertise.create', ['id' => $post->id]) }}">Marcom</a>
            <?php endif ?>
            <?php $level = auth()->user()->level ; if ($level=='1'): ?>
            
            <form action="{{ route('sewa.destroy',$post->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('sewa.show',$post->id) }}">Show</a>

                <a class="btn btn-primary btn-sm" href="{{ route('sewa.edit',$post->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
            
        <?php endif ?>
    </td>
</tr>
@endforeach
</table>
</div>


@endsection