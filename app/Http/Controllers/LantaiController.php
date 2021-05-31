<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lantai;

class LantaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lantai = Lantai::latest()->paginate(5);
        return view('lantai.index',compact('Lantai'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('lantai.create');
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
            'nama_lantai' => 'required'
        ]);
         
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Lantai::create($request->all());
         
        /// redirect jika sukses menyimpan data
        return redirect()->route('lantai.index')
                        ->with('success','Data lantai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lantai $Lantai)
    {
        return view('lantai.show',compact('Lantai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lantai $Lantai)
    {
      return view('lantai.edit',compact('Lantai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Lantai $Lantai)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'nama_lantai' => 'required',

        ]);
         
        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $Lantai->update($request->all());
         
        /// setelah berhasil mengubah data
        return redirect()->route('lantai.index')
                        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lantai $Lantai)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $Lantai->delete();
  
        return redirect()->route('lantai.index')
                        ->with('success','Data berhasil dihapus');
    }
}
