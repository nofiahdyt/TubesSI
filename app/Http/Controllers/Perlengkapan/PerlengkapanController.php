<?php

namespace App\Http\Controllers\Perlengkapan;

use App\Http\Controllers\Controller;
use App\Models\Perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerlengkapanController extends Controller
{
    public function index()
    {
        $perlengkapan = DB::table('tb_perlengkapan')->get();
        return view('perlengkapan/perlengkapan',['perlengkapan' => $perlengkapan]);
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
        // dd($request->gambar);
        $this->_validation($request);
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/image/'), $imgName);
        Perlengkapan::create([
            "nama_perlengkapan" => $request->nama_perlengkapan,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "gambar" => $imgName
        ]);
        return redirect('/perlengkapan/perlengkapan');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'gambar' => 'mimes:jpeg,png,jpg',
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
    public function edit(Perlengkapan $perlengkapan, $id)
    {
        // $setup = Setup::find($id);
        $perlengkapan = DB::table('tb_perlengkapan')->where('id_perlengkapan',$id)->get();
        return view('perlengkapan.perlengkapan-edit', ['perlengkapan'=>$perlengkapan]);
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
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/image/'), $imgName);
        Perlengkapan::where('id_perlengkapan', $id)->update([
            'id_perlengkapan'=>$request->id,
            "nama_perlengkapan"=>$request->nama_perlengkapan,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "gambar" => $imgName
        ]);
        return redirect('/perlengkapan/perlengkapan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perlengkapan::where('id_perlengkapan',$id)->delete();
        return redirect()->route('perlengkapan.index');
    }
}
