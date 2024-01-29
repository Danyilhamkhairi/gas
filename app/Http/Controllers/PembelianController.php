<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pembelian;

class PembelianController extends Controller
{
   protected $dir = 'pembelian';

   public function index()
   {
   	$data = Pembelian::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
   	return view($this->dir.'.create');
   }

   public function store(Request $req)
   {
   	$simpan = new Pembelian;
   	$simpan->NamaPembelian = $req->NamaPembelian;  
      $simpan->Harga = $req->Harga;   
      $simpan->Stok = $req->Stok;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   		// return redirect()->to('mobil');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   		// return "error";
   	}
   }

   public function edit($id)
   {
   	$data = Pembelian::find($id);
   	return view($this->dir.'.edit', compact('data'));
   }

    public function update(Request $req, $id)
   {
      $simpan = Pembelian::find($id);
      $simpan->NamaPembelian = $req->NamaPembelian;  
      $simpan->Harga = $req->Harga;   
      $simpan->Stok = $req->Stok;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
         // return "error";
      }
   }

   public function destroy($id)
   {
      $data = Pembelian::find($id);
      $delete = $data->delete();
      if($delete) {
         return redirect()->back()->with('message','Data berhasil dihapus');
         // return redirect()->to('mobil');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
         // return "Gagal menghapus";
      }
   }
}
