<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sewa;
use App\Models\penyewa;
use App\Models\tennant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class sewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sewa = DB::table('sewas')->get();
         $sewa = DB::table('sewas')
        ->select('sewas.id','nama_tennant','nama_pemilik','id_penyewa','id_tennant','tgl_sewa','id_penyewa','id_tennant','biaya','tgl_awal_sewa','tgl_akhir_sewa')
        ->join('tennants', 'tennants.id', '=', 'sewas.id_tennant')
        ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')

        ->get();
        // $sewa = sewa::latest()->paginate(5);
        return view('sewa.index',compact('sewa'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tennants = tennant::all();
        $penyewas = penyewa::all();
        return view('sewa.create', compact('tennants','penyewas'));
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
        'tgl_sewa' => 'required',
        'id_penyewa' => 'required',
        'id_tennant' => 'required',
        'biaya' => 'required',
        'tgl_awal_sewa' => 'required',
        'tgl_akhir_sewa' => 'required'
    ]);

     $sewa = sewa::create([
        'tgl_sewa' => $request->tgl_sewa,
        'id_penyewa' => $request->id_penyewa,
        'id_tennant' => $request->id_tennant,
        'biaya' => $request->biaya,
        'tgl_awal_sewa' => $request->tgl_awal_sewa,
        'tgl_akhir_sewa'     => $request->tgl_akhir_sewa
    ]);
       // dd($sewa);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
     return redirect()->route('sewa.index')
     ->with('success','Data sewa berhasil ditambahkan');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sewa $sewa)
    {
        return view('sewa.show',compact('sewa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(sewa $sewa)
    {
         $tennants = tennant::all();
        $penyewas = penyewa::all();
        return view('sewa.edit', compact('sewa','tennants','penyewas'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,sewa $sewa)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
         'tgl_sewa' => 'required',
         'id_penyewa' => 'required',
         'id_tennant' => 'required',
         'biaya' => 'required',
         'tgl_awal_sewa' => 'required',
         'tgl_akhir_sewa' => 'required',
     ]);
     $sewa = sewa::where('id', $request->id)->update([
        'tgl_sewa' => $request->tgl_sewa,
        'id_penyewa' => $request->id_penyewa,
        'id_tennant' => $request->id_tennant,
        'biaya' => $request->biaya,
        'tgl_awal_sewa' => $request->tgl_awal_sewa,
        'tgl_akhir_sewa'     => $request->tgl_akhir_sewa,

    ]);
        /// setelah berhasil mengubah data
     return redirect()->route('sewa.index')
     ->with('success','Data berhasil di ubah');
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sewa $sewa)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $sewa->delete();

        return redirect()->route('sewa.index')
        ->with('success','Data berhasil dihapus');
    }
}
