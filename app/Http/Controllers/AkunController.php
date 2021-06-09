<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akun;
use App\Models\kategori;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class akunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun = DB::table('users')->get();
        // $akun = akun::latest()->paginate(5);
        return view('akun.index',compact('akun'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kategoris = kategori::all();
        // $lantais = lantai::all();
        return view('akun.create', compact());
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
        'name' => 'required',
        'email' => 'required',
        'level' => 'required',
        
    ]);

       $akun = akun::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'level' => $request->level,
    ]);
       // dd($akun);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
       return redirect()->route('akun.index')
       ->with('success','Data akun berhasil ditambahkan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(akun $akun)
    {
        return view('akun.show',compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(akun $akun)
    {
       // $kategoris = kategori::all();
       // $lantais = lantai::all();
     return view('akun.edit',compact('akun'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,akun $akun)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'level' => 'required',
       ]);
        $nama_usaha = $request->nama_usaha;

        $akun = akun::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,

        ]);
        /// setelah berhasil mengubah data
        return redirect()->route('akun.index')
        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(akun $akun)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $akun->delete();

        return redirect()->route('akun.index')
        ->with('success','Data berhasil dihapus');
    }
}
