<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sewa_advertise;
use App\Models\advertise;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class Sewa_AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sewa_advertise = DB::table('sewa_advertise')->get();
        // $sewa_advertise = sewa_advertise::latest()->paginate(5);
         $sewa_advertise = DB::table('sewa_advertise')
        ->select('sewa_advertise.*','penyewas.nama_pemilik','nama_advertise')
        ->join('sewas', 'sewas.id', '=', 'sewa_advertise.id_sewa')
        ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')
        ->join('advertise', 'advertise.id', '=', 'sewa_advertise.id_advertise')

        ->get();
        return view('sewa_advertise.index',compact('sewa_advertise'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = request('id', 1);
        if ($id=='') {
         $sewas = DB::table('sewas')
         ->select('sewas.id','nama_pemilik','nama_tennant')
         ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')
         ->join('tennants', 'tennants.id', '=', 'sewas.id_tennant')
         ->get();
     }else{
         $sewas = DB::table('sewas')
         ->select('sewas.id','nama_pemilik','nama_tennant')
         ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')
         ->join('tennants', 'tennants.id', '=', 'sewas.id_tennant')
         ->where('sewas.id',$id)
         ->get();
     }
     $advertise = DB::table('advertise')->where('advertise.status','1')->get();
     return view('sewa_advertise.create', compact('advertise','sewas'));
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
        'id_sewa' => 'required',
        'id_advertise' => 'required',
        'tgl_mulai_sewa' => 'required',
        'lama_sewa' => 'required'
    ]);
       $sewa_advertise = sewa_advertise::create([
           'id_sewa' => $request->id_sewa,
           'id_advertise' => $request->id_advertise,
           'tgl_mulai_sewa' => $request->tgl_mulai_sewa,
           'lama_sewa' => $request->lama_sewa,
           'id_users' => $request->id_users
       ]);

         $advertise = advertise::where('id', $request->id_advertise)->update([
        'status'     => '0'
      ]);
    $get = DB::table('advertise')->where('id',$request->id_advertise)->first();
$jns_tagihan =  "Biaya Sewa Iklan";
    $deskripsi = "Tagihan Sewa Iklan";
          $tagihan = DB::table('tagihans')->insert(
       array('id_sewa' => $request->id_sewa,
        'jenis_tagihan' => $jns_tagihan,
        'tgl_tagihan' => date("Y-m-d"),
        'deskripsi' => $deskripsi,
        'nominal' => $request->lama_sewa*$get->harga,
        'status' => '0')
   );
        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
       return redirect()->route('sewa_advertise.index')
       ->with('success','Data sewa_advertise berhasil ditambahkan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(sewa_advertise $sewa_advertise)
    {
        return view('sewa_advertise.show',compact('sewa_advertise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(sewa_advertise $sewa_advertise)
    {
     $lantais = lantai::all();
     return view('sewa_advertise.edit',compact('sewa_advertise','lantais'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,sewa_advertise $sewa_advertise)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'id_sewa' => 'required',
            'id_advertise' => 'required',
            'tgl_mulai_sewa' => 'required',
            'lama_sewa' => 'required',
           

        ]);
        $sewa_advertise = sewa_advertise::where('id', $request->id)->update([
            'id_sewa' => $request->id_sewa,
            'id_advertise' => $request->id_advertise,
            'tgl_mulai_sewa' => $request->tgl_mulai_sewa,
            'lama_sewa' => $request->lama_sewa,
            'status' => $request->status,
        ]);
        /// setelah berhasil mengubah data
        return redirect()->route('sewa_advertise.index')
        ->with('success','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sewa_advertise $sewa_advertise)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $sewa_advertise->delete();

        return redirect()->route('sewa_advertise.index')
        ->with('success','Data berhasil dihapus');
    }
}
