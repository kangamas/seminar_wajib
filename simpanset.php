<?php
include "koneksi.php";
$tahun=$_POST['txttahun'];
$jenis=$_POST['cmbjenis'];
$tanggal=$_POST['txttgl'];
$ket=$_POST['txtket'];
$po=$_POST['txtPO'];

$cmbgrp=$_POST['cmbgrp'];
$cmbprodi=$_POST['cmbprodi'];

if ( empty($tahun) || empty($jenis) ||	empty($tanggal) || empty($ket) || empty($po)) {
	echo "<script>alert('Silahkan diisi semua !!!.');javascript:history.back(-1);</script>";
}else{
	$sqlinsert=mssql_query("insert into c_event (tahun,jenis,tgl,ket,po,grp,prodi) values('$tahun','$jenis','$tanggal','$ket','$po','$cmbgrp','$cmbprodi')");
	if($sqlinsert){
		echo "<script>alert('Data disimpan.');javascript:history.back(-1);</script>";

	}else{
		echo "<script>alert('Data tidak berhasil disimpan.');javascript:history.back(-1);</script>";
	}
}






?>