<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penyewa;
use App\Models\kategori;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class penyewaController extends Controller
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
           if ($level=='2') {
           $penyewa = DB::table('penyewas')
           ->where('id_users', $id)
           ->get();
       }else{
          $penyewa = DB::table('penyewas')
           ->get();  
       }
        // $penyewa = penyewa::latest()->paginate(5);
        return view('penyewa.index',compact('penyewa'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function keluhan()
    {
      

     return view('keluhan.index');
 }
    public function create()
    {
        $kategoris = kategori::all();
        $lantais = lantai::all();
        $users = DB::table('users')->get();

        return view('penyewa.create', compact('kategoris','lantais','users'));
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
        'nama_pemilik' => 'required',
        'alamat_pemilik' => 'required',
        'hp' => 'required',
        'ktp' => 'required',
        'nama_usaha' => 'required',
        'alamat_usaha' => 'required',
        'no_siup' => 'required',
    ]);

     $penyewa = penyewa::create([
        'nama_pemilik' => $request->nama_pemilik,
        'alamat_pemilik' => $request->alamat_pemilik,
        'hp' => $request->hp,
        'ktp' => $request->ktp,
        'nama_usaha'     => $request->nama_usaha,
        'alamat_usaha' => $request->alamat_usaha,
        'no_siup' => $request->no_siup,
        'id_users' => $request->id_users,
    ]);
       // dd($penyewa);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
     return redirect()->route('penyewa.index')
     ->with('success','Data penyewa berhasil ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(penyewa $penyewa)
    {
        return view('penyewa.show',compact('penyewa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(penyewa $penyewa)
    {
       $kategoris = kategori::all();
       $lantais = lantai::all();
        $users = DB::table('users')->get();

       return view('penyewa.edit',compact('penyewa','kategoris','lantais','users'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,penyewa $penyewa)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
         'nama_pemilik' => 'required',
         'alamat_pemilik' => 'required',
         'hp' => 'required',
         'ktp' => 'required',
         'nama_usaha' => 'required',
         'alamat_usaha' => 'required',
         'no_siup' => 'required',
     ]);
        $nama_usaha = $request->nama_usaha;

     $penyewa = penyewa::where('id', $request->id)->update([
        'id_users' => $request->id_users,
        'nama_pemilik' => $request->nama_pemilik,
        'alamat_pemilik' => $request->alamat_pemilik,
        'hp' => $request->hp,
        'ktp' => $request->ktp,
        'nama_usaha'     => $request->nama_usaha,
        'alamat_usaha' => $request->alamat_usaha,
        'no_siup' => $request->no_siup,

    ]);
        /// setelah berhasil mengubah data
     return redirect()->route('penyewa.index')
     ->with('success','Data berhasil di ubah');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(penyewa $penyewa)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $penyewa->delete();

        return redirect()->route('penyewa.index')
        ->with('success','Data berhasil dihapus');
    }
}
