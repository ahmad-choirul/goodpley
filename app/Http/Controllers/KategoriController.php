<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $kategori = kategori::latest()->paginate(5);
        return view('kategori.index',compact('kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('kategori.create');
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
            'nama_kategori' => 'required'
        ]);
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        kategori::create($request->all());
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('kategori.index')
                        ->with('success','Data kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        return view('kategori.show',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kategori $kategori)
    {
      return view('kategori.edit',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,kategori $kategori)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nama_kategori' => 'required',

        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $kategori->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('kategori.index')
                        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategori $kategori)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $kategori->delete();
  
        return redirect()->route('kategori.index')
                        ->with('success','Data berhasil dihapus');
    }
}
