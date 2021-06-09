<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class advertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $advertise = DB::table('advertise')->get();
        $advertise = advertise::latest()->paginate(5);
        return view('advertise.index',compact('advertise'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $lantais = lantai::all();
        return view('advertise.create', compact('lantais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
     $request->validate([
        'nama_advertise' => 'required',
        'lebar' => 'required',
        'panjang' => 'required',
        'id_lantai' => 'required',
        'jenis' => 'required',
        'harga' => 'required',
        'gambar' => 'required',
    ]);
     $gambar = $request->gambar;
     $filename = date('YmHis') . Str::random(8) . "." . $gambar->getClientOriginalExtension();
//Kemudian di simpan di storage dengan nama yang ditentukan tadi

     $gambar->storeAs('public/images', $filename);
//Nama ini juga disimpan ke kolom, misal ke artikel

     $advertise = advertise::create([
         'nama_advertise' => $request->nama_advertise,
         'lebar' => $request->lebar,
         'panjang' => $request->panjang,
         'id_lantai' => $request->id_lantai,
         'jenis' => $request->jenis,
         'harga' => $request->harga,
         'gambar' => $filename,

     ]);
       // dd($advertise);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
     return redirect()->route('advertise.index')
     ->with('success','Data advertise berhasil ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(advertise $advertise)
    {
        return view('advertise.show',compact('advertise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(advertise $advertise)
    {
       $lantais = lantai::all();
       return view('advertise.edit',compact('advertise','lantais'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,advertise $advertise)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nama_advertise' => 'required',
            'lebar' => 'required',
            'panjang' => 'required',
            'id_lantai' => 'required',
            'jenis' => 'required',
            'harga' => 'required',

        ]);
         $gambar = $request->gambar;
     $filename = date('YmHis') . Str::random(8) . "." . $gambar->getClientOriginalExtension();
//Kemudian di simpan di storage dengan nama yang ditentukan tadi
 if ($filename=='') {
         $filename = date('YmHis') . Str::random(8) . "." . $gambar->getClientOriginalExtension();

     }
     $gambar->storeAs('public/images', $filename);
        $advertise = advertise::where('id', $request->id)->update([
            'nama_advertise' => $request->nama_advertise,
            'lebar' => $request->lebar,
            'panjang' => $request->panjang,
            'id_lantai' => $request->id_lantai,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $filename,
        ]);
        /// setelah berhasil mengubah data
        return redirect()->route('advertise.index')
        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(advertise $advertise)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $advertise->delete();

        return redirect()->route('advertise.index')
        ->with('success','Data berhasil dihapus');
    }
}
