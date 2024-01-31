
<?php 

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	echo $hasil_rupiah;
 
}


function tanggal_indo($tgl)
{
	if ($tgl!='') {
		return date('d-m-Y', strtotime($tgl));
	}else {
		return '-';
	}
}

function info_produk($id){
	$data = App\Models\Produk::find($id);
	$harga = @$data->Harga;
	$nama_produk = @$data->NamaProduk;
	return ['harga'=>$harga, 'nama_produk'=>$nama_produk];
}


function update_total_harga($id)
{
	$detail = App\Models\DetailPembelian::where('PembelianID', $id)->get();
	$total = 0;
	foreach ($detail as $d) {
		$total += $d->Subtotal;	
	}

	$data_pembelian = App\Models\Pembelian::find($id);
	$data_pembelian->Totalharga = $total;
	$data_pembelian->save();
}