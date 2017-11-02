<?php
include '../../koneksi.php';
include 'header.php';
//validasi
if (trim($_POST['nim']) == '') {
	$error[] = '- NIM harus diisi';
}
$txtnim = $_POST['nim'];
$jbayar=350000;
$sqlbayar=mssql_query("select SUM(bayar) as bayar from t_byrlain where dari='$txtnim' and jenisbyr='b09' and bayar_tg >='2016-02-01'");
$hbayar=mssql_fetch_array($sqlbayar);
$bayar=$hbayar['bayar'];


if (isset($error)) {
	echo '<b>Error</b>: <br/>'.implode('<br />', $error);
} else {
	if($bayar < $jbayar){
	?>
		<script>
		alert("Maaf.. Anda Tidak Diperkenankan Mengisi Presensi ");
		window.location = 'index.php';
		</script>
	<?php
	}else{
		$sqlada=mssql_query("select *from sertifikasi where jenis='S005' and tgl='$tgl' and npm='$txtnim' ");
		if(mssql_num_rows($sqlada)>=1){
		?>	<script>
			alert("Maaf.. Anda Sudah Mengisi Presensi ");
			window.location = 'index.php';
			</script>
		<?php
		}else{
			$mysqlstr = "INSERT INTO sertifikasi (npm,jenis,tgl,ket)VALUES('$txtnim', 'S005','2016-04-29','HOTEL CIUMBELEUIT')";
			$mysqlq = mssql_query($mysqlstr);
			?>
			<script>
				window.location = 'index.php';
			</script>
			<?php
		}
	}
	
	$data = '';
	include_once('data.php');
}
die();
?>