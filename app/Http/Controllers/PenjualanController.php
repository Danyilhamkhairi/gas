<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Penjualan;
Use App\Models\Pelanggan;
Use App\Models\Produk;
Use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
   protected $dir = 'penjualan';

   public function index()
   {
   	$data = Penjualan::all();
   	return view($this->dir.'.index', compact('data'));
   }

   public function create()
   {
      $pelanggan = Pelanggan::all();
   	return view($this->dir.'.create', compact('pelanggan'));
   }

   public function store(Request $req)
   {
   	$simpan = new Penjualan;
   	$simpan->TanggalPenjualan = $req->TanggalPenjualan;  
      $simpan->PelangganID = $req->PelangganID;
      $simpan->Pembeli = $req->Pembeli;
   	$save = $simpan->save();
   	if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = Penjualan::find($id);
      $pelanggan = Pelanggan::all();
   	return view($this->dir.'.edit', compact('data', 'pelanggan'));
   }

    public function update(Request $req, $id)
   {
      $simpan = Penjualan::find($id);
      $simpan->TanggalPenjualan = $req->TanggalPenjualan;  
      $simpan->PelangganID = $req->PelangganID;
      $simpan->Pembeli = $req->Pembeli;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      $data = Penjualan::find($id);
      $delete = $data->delete();
      if($delete) {

         $detail = DetailPenjualan::where('PenjualanID', $id)->get();

         foreach ($detail as $d) {
            update_plus_produk($d->ProdukID, $d->JumlahProduk);
            $hapus_detail = DetailPenjualan::find($d->DetailID);
            $hapus_detail->delete();
         }

         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }


   public function detail(Request $req, $id)
   {
      $data_penjualan = Penjualan::find($id);
      $produk = Produk::all();
      $detail = DetailPenjualan::where('PenjualanID', $id)->get();
      return view($this->dir.'.detail', compact('data_penjualan', 'produk', 'detail'));
   }

      public function tunai(Request $req, $id)
   {
      $data_penjualan = Penjualan::find($id);
      $kembali = ($req->tunai - $data_penjualan->TotalHarga);
      $data_penjualan->tunai = $req->tunai;
      $data_penjualan->kembali = $kembali;
      $save = $data_penjualan->save();
      if($save){
         return redirect()->back()->with('message','Data berhasil disimpan');
      }else {
         return redirect()->back()->with('error','Data gagal disimpan');
      }
   }

   public function struk(Request $req, $id)
   {
      $data_penjualan = Penjualan::find($id);
      $detail = DetailPenjualan::where('PenjualanID', $id)->get();
      return view('penjualan.struk', compact('data_penjualan', 'detail'));
   }
}
