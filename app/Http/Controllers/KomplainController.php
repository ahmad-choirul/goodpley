<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komplain;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komplain = komplain::latest()->paginate(5);
        return view('komplain.index',compact('komplain'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('komplain.create');
 }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request->validate([
        'jenis' => 'required',
        'rincian_masalah' => 'required',
        'rincian_balasan' => 'required',
        'status' => 'required',

    ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
     
     $komplain = komplain::create([
        'jenis' => $request->jenis,
        'rincian_masalah' => $request->rincian_masalah,
        'rincian_balasan' => $request->rincian_balasan,
        'id_penyewa' => $request->id_penyewa,
        'id_outsourcing' => $request->id_outsourcing,
        'status' => $request->status,
    ]);

        /// redirect jika sukses menyimpan data
     return redirect()->route('komplain.index')
     ->with('success','Data komplain berhasil ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(komplain $komplain)
    {
        return view('komplain.show',compact('komplain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(komplain $komplain)
    {
      return view('komplain.edit',compact('komplain'));
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,komplain $komplain)
    {
        /// membuat validasi untuk title dan content wajib diisi
    $request->validate([
        'jenis' => 'required',
        'rincian_masalah' => 'required',
        'rincian_balasan' => 'required',
        'status' => 'required',

    ]);
     
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
     
     $komplain = komplain::where('id', $request->id)->update([
        'jenis' => $request->jenis,
        'rincian_masalah' => $request->rincian_masalah,
        'rincian_balasan' => $request->rincian_balasan,
        'id_penyewa' => $request->id_penyewa,
        'id_outsourcing' => $request->id_outsourcing,
        'status' => $request->status,
    ]);

        /// setelah berhasil mengubah data
        return redirect()->route('komplain.index')
        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(komplain $komplain)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $komplain->delete();

        return redirect()->route('komplain.index')
        ->with('success','Data berhasil dihapus');
    }
}
