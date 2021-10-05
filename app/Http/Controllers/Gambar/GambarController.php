<?php

namespace App\Http\Controllers\Gambar;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GambarController extends Controller
{
    public function index()
    {
        // $data_barang = DB::table('data_barang')->paginate(3);
        $gambar = Gambar::get();
        return view('gambar/gambar',['gambar' => $gambar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // *
     // * Store a newly created resource in storage.
     // *
     // * @param  \Illuminate\Http\Request  
    // $request
     // * @return \Illuminate\Http\Response
     
    public function store(Request $request)
    {
        // dd($request);
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();
        // $this->_validation($request);
            $ft=$request->gambar;
            $newft=rand(1111,9999).'.'.$ft->getClientOriginalExtension();
// dd($newft);
        DB::table('tb_gambar')->insert([
            'gambar'=>$newft,
            'nama_gambar'=>$request->nama_gambar
        ]);
            $ft->move(public_path().'/assets/img',$newft);
        return redirect()->back();
    }

     private function _validation(Request $request){
        $validation = $request->validate([
            'nama_gambar' => 'required|max:100|min:3',
        ],
        [
            'nama_gambar.required' => 'Harus diisi',
            'nama_gambar.min' => 'Minimal 3 karakter',
            'nama_gambar.max' => 'Maksimal 100 karakter'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambar $gambar, $id)
    {
        $gambar = DB::table('tb_gambar')->where('id',$id)->get();
        return view('gambar.gambar-edit', ['gambar'=>$gambar]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        Gambar::where('id', $id)->update(['nama_gambar' => $request->nama_gambar]);
        return redirect('/gambar/gambar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gambar::destroy($id);
        return redirect()->route('gambar.index');
    }
}
