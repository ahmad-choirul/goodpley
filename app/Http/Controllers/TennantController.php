<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tennant;
use App\Models\kategori;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
class TennantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tennant = DB::table('tennants')
        ->select('tennants.id','nama_tennant','nama_lantai','nama_kategori','lebar','panjang','gambar')
        ->join('lantai', 'tennants.id_lantai', '=', 'lantai.id')
        ->join('kategoris', 'tennants.id_kategori', '=', 'kategoris.id')

        ->get();
        // $tennant = tennant::latest()->paginate(5);
        return view('tennant.index',compact('tennant'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();
        $lantais = lantai::all();
        return view('tennant.create', compact('kategoris','lantais'));
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
        'nama_tennant' => 'required',
        'id_lantai' => 'required',
        'id_kategori' => 'required',
        'lebar' => 'required',
        'panjang' => 'required',
        'gambar' => 'required',
    ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
       tennant::create($request->all());

        /// redirect jika sukses menyimpan data
       return redirect()->route('tennant.index')
       ->with('success','Data tennant berhasil ditambahkan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tennant $tennant)
    {
        return view('tennant.show',compact('tennant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tennant $tennant)
    {
       $kategoris = kategori::all();
       $lantais = lantai::all();
       return view('tennant.edit',compact('tennant','kategoris','lantais'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tennant $tennant)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
         'nama_tennant' => 'required',
         'id_lantai' => 'required',
         'id_kategori' => 'required',
         'lebar' => 'required',
         'panjang' => 'required',
         'gambar' => 'required',
     ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $tennant->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('tennant.index')
        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tennant $tennant)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $tennant->delete();

        return redirect()->route('tennant.index')
        ->with('success','Data berhasil dihapus');
    }
}
