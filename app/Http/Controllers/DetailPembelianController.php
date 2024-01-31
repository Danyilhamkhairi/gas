<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pembelian;
Use App\Models\Supplier;
Use App\Models\Produk;
Use App\Models\DetailPembelian;

class DetailPembelianController extends Controller
{
    public function store(Request $req)
   {
   	$simpan = new DetailPembelian;
   	$simpan->PembelianID = $req->PembelianID;   
      $simpan->ProdukID = $req->ProdukID; 
      $simpan->JumlahProduk = $req->JumlahProduk; 

      $harga = info_produk($req->ProdukID)['harga'];
      $Subtotal = $harga * $req->JumlahProduk;
      $simpan->Subtotal = $Subtotal; 
   	$save = $simpan->save();      

   	if($save){
         update_total_harga($req->PembelianID);
         return redirect()->back()->with('message','Data berhasil ditambahkan');
   	}else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
   	}
   }

   public function edit($id)
   {
   	$data = Pembelian::find($id);
      $supplier = Supplier::all();
   	return view($this->dir.'.edit', compact('data', 'supplier'));
   }

    public function update(Request $req, $id)
   {
      $simpan = Pembelian::find($id);
      $simpan->TanggalPembelian = $req->TanggalPembelian;  
      $simpan->SupplierID = $req->SupplierID;
      $save = $simpan->save();
      if($save){
         return redirect()->to($this->dir.'')->with('message','Data berhasil dirubah');
      }else {
         return redirect()->back()->with('error','Data gagal ditambahkan');
      }
   }

   public function destroy($id)
   {
      
      $data = DetailPembelian::find($id);
      $id_pembelian = $data->PembelianID;
      $delete = $data->delete();
      if($delete) {
         update_total_harga($id_pembelian);
         return redirect()->back()->with('message','Data berhasil dihapus');
      }else {
         return redirect()->back()->with('error','Data gagal dihapus');
      }
   }

}
