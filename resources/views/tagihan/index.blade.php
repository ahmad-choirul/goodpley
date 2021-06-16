@extends('template')

@section('content')
  <div class="row mt-5 mb-5">
    <br>
    <br>
    <div class="col-lg-12 margin-tb">
      <div class="float-left">
        <h2>Daftar Tagihan</h2>
      </div>
      <?php
      $level = auth()->user()->level;
      $id = auth()->user()->id;
      ?>
      <?php if ($level != '2'): ?>
      <div class="float-right">
        <a class="btn btn-success" href="{{ route('tagihan.create') }}"> Tambah Tagihan</a>
      </div>
      <?php endif; ?>

    </div>
  </div>

  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <div class="table-responsive" style="color: black">
    <table class="table table-striped table-hovered" style="color: black;white-space: nowrap;">
      <tr>
        <th width="20px" class="text-center">No</th>
        <th class="text-center">Plaza</th>
        <th class="text-center">Jenis </th>
        <th class="text-center">Tgl</th>
        <th class="text-center">Deskripsi</th>
        <th class="text-center">Nominal</th>
        <th class="text-center">Tagihan</th>
        <th class="text-center">Pembayaran</th>
        <th class="text-center">Admin</th>
        <th class="text-center">Status</th>
        {{-- @if (auth()->user()->level != 2) --}}
        <th width="280px" class="text-center">Action</th>
        {{-- @endif --}}
      </tr>
      @foreach ($tagihan as $post)
        <tr>
          <td class="text-center">{{ ++$i }}</td>
          <td>{{ $post->nama_pemilik }}</td>
          <td>{{ $post->jenis_tagihan }}</td>
          <td>{{ $post->tgl_tagihan }}</td>
          <td>{{ $post->deskripsi }}</td>
          <td>{{ $post->nominal }}</td>
          <td><img src=" {{ asset('storage/images/' . $post->bukti_tagihan) }}" width="100px"> </td>
          <td><img src=" {{ asset('storage/images/' . $post->bukti_pembayaran) }}" width="100px"> </td>
          <td>{{ $post->id_users }}</td>
          <td> <?php if ($post->status == '0') { ?>
            <span class="label label-warning">Belum</span>
            <?php } else { ?>
            <span class="label label-success">Sudah</span>
            <?php } ?>
          </td>
          <td class="text-center">
            @if (auth()->user()->level != 2)
              <form action="{{ route('tagihan.destroy', $post->id) }}" method="POST">

                <a class="btn btn-info btn-sm" href="{{ route('tagihan.show', $post->id) }}">Show</a>

                <a class="btn btn-primary btn-sm" href="{{ route('tagihan.edit', $post->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
              </form>
            @else
<?php if ($post->status == '0'): ?>
              <a class="btn btn-primary btn-sm" href="{{ route('tagihan.form-bayar', $post->id) }}">Bayar</a>
  
<?php endif ?>
            @endif
          </td>
        </tr>
      @endforeach
    </table>
  </div>


@endsection
