<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tagihans;
use App\Models\sewa;
use App\Models\penyewa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level  = auth()->user()->level;
        $id  = auth()->user()->id;
        if ($level == '2') {
            $tagihan = DB::table('tagihans')
                ->select('nama_pemilik', 'jenis_tagihan', 'tgl_tagihan', 'deskripsi', 'bukti_tagihan', 'bukti_pembayaran', 'tagihans.id_users', 'tagihans.status', 'tagihans.id', 'nominal')
                ->join('sewas', 'sewas.id', '=', 'tagihans.id_sewa')
                ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')
                ->where('penyewas.id_users', $id)
                ->get();
        } else {
            $tagihan = DB::table('tagihans')->select('nama_pemilik', 'jenis_tagihan', 'tgl_tagihan', 'deskripsi', 'bukti_tagihan', 'bukti_pembayaran', 'tagihans.id_users', 'tagihans.status', 'tagihans.id', 'nominal')
                ->join('sewas', 'sewas.id', '=', 'tagihans.id_sewa')
                ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')


                ->get();
        }
        return view('tagihan.index', compact('tagihan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyewa = penyewa::all();
        $sewa = sewa::all();
        return view('tagihan.create', compact('penyewa', 'sewa'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_penyewa'    => 'required',
            'jenis_tagihan' => 'required',
            'tgl_tagihan'   => 'required',
            'deskripsi'     => 'required',
            'nominal'       => 'required',
            'bukti_tagihan' => 'required',
            'id_users'      => 'required',   //id admin yg input pembayaran
            'status'        => 'required',
        ]);
        $bukti_tagihan = $request->bukti_tagihan;
        $filename = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();
        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaran = $request->bukti_pembayaran;
            $filename2 = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran->storeAs('public/images', $filename2);
        }
        $bukti_tagihan->storeAs('public/images', $filename);
        $user_id  = auth()->user()->id;
        $tagihan = tagihans::create([
            'id_sewa'          => $request->id_penyewa,
            'jenis_tagihan'    => $request->jenis_tagihan,
            'tgl_tagihan'      => $request->tgl_tagihan,
            'tgl_pembayaran'   => $request->tgl_pembayaran,
            'deskripsi'        => $request->deskripsi,
            'nominal'          => $request->nominal,
            'bukti_tagihan'    => $filename,
            'bukti_pembayaran' => $filename2 ?? null,
            'id_users'         => $user_id,                   //$request->id_users, //id admin yg input pembayaran
            'status'           => $request->status,
        ]);
        // dd($tagihan);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
        return redirect()->route('tagihan.index')
            ->with('success', 'Data tagihan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tagihans $tagihan)
    {
        $penyewa = penyewa::all();
        $sewa = sewa::all();
        return view('tagihan.show', compact('penyewa', 'sewa', 'tagihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tagihans $tagihan)
    {
        $penyewa = penyewa::all();
        $sewa = sewa::all();
        return view('tagihan.edit', [
            'penyewas' => $penyewa,
            'sewa'     => $sewa,
            'tagihan'  => $tagihan,
        ]);
        // return view('tagihan.edit', compact('penyewa', 'sewa', 'tagihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tagihans $tagihan)
    {
        $request->validate([
            'id_penyewa'       => 'required',
            'jenis_tagihan'    => 'required',
            'tgl_tagihan'      => 'required',
            'deskripsi'        => 'required',
            'nominal'          => 'required',
            'bukti_tagihan'    => 'nullable',
            'bukti_pembayaran' => 'nullable',
            'tgl_pembayaran'   => 'required',
            'id_users'         => 'required',   //yg input tagihan /aprrove
            'status'           => 'required',

        ]);

        $bukti_tagihan    = $request->bukti_tagihan;
        $bukti_pembayaran = $request->bukti_pembayaran;
        if ($request->hasFile('bukti_tagihan')) {
            $filename         = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();

            if ($filename == '') {
                $filename = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();
            }
            $bukti_tagihan->storeAs('public/images', $filename);
        }
        if ($request->hasFile('bukti_pembayaran')) {
            $filename2        = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
            //Kemudian di simpan di storage dengan nama yang ditentukan tadi
            if ($filename2 == '') {
                $filename2 = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
            }
            $bukti_pembayaran->storeAs('public/images', $filename2);
        }

        $tagihan->update([
            'id_sewa'       => $request->id_penyewa,
            'jenis_tagihan'    => $request->jenis_tagihan,
            'tgl_tagihan'      => $request->tgl_tagihan,
            'deskripsi'        => $request->deskripsi,
            'nominal'          => $request->nominal,
            'bukti_tagihan'    => $filename ?? $tagihan->bukti_tagihan,
            'bukti_pembayaran' => $filename2 ?? $tagihan->bukti_pembayaran,
            'tgl_pembayaran'   => $request->tgl_pembayaran,
            'id_users'         => $request->id_users,
            'status'           => $request->status,
        ]);
        /// setelah berhasil mengubah data
        return redirect()->route('tagihan.index')
            ->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tagihans $tagihan)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $tagihan->delete();

        return redirect()->route('tagihan.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function formBayar(tagihans $tagihan)
    {
        return view('tagihan.form-bayar', [
            'tagihan'  => $tagihan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayar(Request $request, tagihans $tagihan)
    {
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);

        $bukti_pembayaran = $request->bukti_pembayaran;
        if ($request->hasFile('bukti_pembayaran')) {
            $filename2        = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
            //Kemudian di simpan di storage dengan nama yang ditentukan tadi
            if ($filename2 == '') {
                $filename2 = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
            }
            $bukti_pembayaran->storeAs('public/images', $filename2);
        }

        $tagihan->update([
            'bukti_pembayaran' => $filename2 ?? $tagihan->bukti_pembayaran,
            'tgl_pembayaran'   => $request->tgl_pembayaran,
        ]);
        /// setelah berhasil mengubah data
        return redirect()->route('tagihan.index')
            ->with('success', 'Berhasil dibayar');
    }
}
