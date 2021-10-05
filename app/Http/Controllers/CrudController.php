<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    //tampil data
    public function index() {
        $data_barang = DB::table('data_barang')->paginate(3);
    	return view('crud',['data_barang' => $data_barang]);
    }

    //method untuk menampilkan form tambah data
    public function tambah() {
    	return view('crud-tambah-data');
    }

    //method untuk simpan data
    public function simpan(Request $request) {
    	// dd($request->all());
    	// DB::insert('INSERT INTO data_barang (kode_barang, nama_barang) VALUES (?, ?)', [$request->kode_barang, $request->nama_barang]);

        $this->_validation($request);

        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode_barang, 'nama_barang' => 
                $request->nama_barang],
            // ['kode_barang' => $request->kode_barang, 'nama_barang' => 
            //     $request->nama_barang],
            // ['email' => 'dayle@example.com', 'votes' => 0],
        ]);

        return redirect()->route('crud')->with('message','Data Berhasil Disimpan');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'kode_barang' => 'required|max:10|min:3',
            'nama_barang' => 'required|max:10|min:3'
        ],
        [
            'kode_barang.required' => 'Harus diisi',
            'kode_barang.min' => 'Minimal 3 karakter',
            'kode_barang.max' => 'Maksimal 10 karakter',
            'nama_barang.required' => 'Harus diisi',
            'nama_barang.min' => 'Minimal 3 karakter',
            'nama_barang.max' => 'Maksimal 10 karakter'
        ]);
    }

    //method untuk edit data
    public function edit($id) {
        $data_barang = DB::table('data_barang')->where('id',$id)->first();
        return view('crud-edit-data',['data_barang' => $data_barang]);
    }

    //method untuk hapus data
    public function delete($id) {
        DB::table('data_barang')->where('id',$id)->delete();

        return redirect()->back()->with('message','Data Berhasil Dihapus');
    }

    public function update(Request $request, $id) {
        $this->_validation($request);
       DB::table('data_barang')->where('id',$id)->update([
            'kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang
       ]);

        return redirect()->route('crud')->with('message','Data Berhasil Diupdate');
    }
}
