<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tagihans;
use App\Models\sewa;
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
        // $tagihan = tagihans::latest()->paginate(5);
        $level  = auth()->user()->level;
        $id  = auth()->user()->id;
        if ($level=='1') {
         $tagihan = DB::table('tagihans')
         ->get();  
     }elseif ($level=='2') {
         $tagihan = DB::table('tagihans')
         ->join('sewas', 'sewas.id', '=', 'tagihans.id_sewa')
         ->join('penyewas', 'penyewas.id', '=', 'sewas.id_penyewa')
         ->where('penyewas.id_users', $id)
         ->get();
     }
     return view('tagihan.index',compact('tagihan'))
     ->with('i', (request()->input('page', 1) - 1) * 5);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $penyewa = DB::table('penyewas')->get();
        return view('tagihan.create', compact('penyewa'));
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
        'id_penyewa' => 'required',
        'jenis_tagihan' => 'required',
        'tgl_tagihan' => 'required',
        'deskripsi' => 'required',
        'nominal' => 'required',
        'bukti_tagihan' => 'required',
        'id_users' => 'required', //id admin yg input pembayaran
        'status' => 'required',
    ]);
       $bukti_tagihan = $request->bukti_tagihan;
       $filename = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();
//Kemudian di simpan di storage dengan nama yang ditentukan tadi
       $bukti_tagihan->storeAs('public/images', $filename);
//Nama ini juga disimpan ke kolom, misal ke artikel

       $tagihan = tagihan::create([
        'id_penyewa' => $request->id_penyewa,
        'jenis_tagihan' => $request->jenis_tagihan,
        'tgl_tagihan' => $request->tgl_tagihan,
        'deskripsi' => $request->deskripsi,
        'nominal' => $request->nominal,
        'bukti_tagihan' => $filename,
        'id_users' => $request->id_users, //id admin yg input pembayaran
        'status' => $request->status,

    ]);
       // dd($tagihan);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama

        /// redirect jika sukses menyimpan data
       return redirect()->route('tagihan.index')
       ->with('success','Data tagihan berhasil ditambahkan');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tagihan $tagihan)
    {
        return view('tagihan.show',compact('tagihan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tagihan $tagihan)
    {
     $lantais = lantai::all();
     return view('tagihan.edit',compact('tagihan','penyewa'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,tagihan $tagihan)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'id_penyewa' => 'id_penyewa',
            'jenis_tagihan' => 'required',
            'tgl_tagihan' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
            'bukti_tagihan' => 'required',
            'bukti_pembayaran' => 'required',
            'tgl_pembayaran' => 'required',
            'id_users' => 'required', //yg input tagihan /aprrove
            'status' => 'required',

        ]);

        $bukti_tagihann = $request->bukti_tagihan;
        $bukti_pembayaran = $request->bukti_pembayaran;
        $filename = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();
        $filename2 = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
//Kemudian di simpan di storage dengan nama yang ditentukan tadi
        if ($filename=='') {
           $filename = date('YmHis') . Str::random(8) . "." . $bukti_tagihan->getClientOriginalExtension();
       }
       if ($filename2=='') {
           $filename2 = date('YmHis') . Str::random(8) . "." . $bukti_pembayaran->getClientOriginalExtension();
       }
       $bukti_tagihan->storeAs('public/images', $filename);
       $bukti_pembayaran->storeAs('public/images', $filename);
       $tagihan = tagihan::where('id', $request->id)->update([
        'id_penyewa' => $request->id_penyewa,
        'jenis_tagihan' => $request->jenis_tagihan,
        'tgl_tagihan' => $request->tgl_tagihan,
        'deskripsi' => $request->deskripsi,
        'nominal' => $request->nominal,
        'bukti_tagihan' => $filename,
        'bukti_pembayaran' => $filename2,
        'tgl_pembayaran' => $request->tgl_pembayaran,
        'id_users' => $request->id_users,
        'status' => $request->status,
    ]);
        /// setelah berhasil mengubah data
       return redirect()->route('tagihan.index')
       ->with('success','Data berhasil di ubah');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tagihan $tagihan)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $tagihan->delete();

        return redirect()->route('tagihan.index')
        ->with('success','Data berhasil dihapus');
    }
}
