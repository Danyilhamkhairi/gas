
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