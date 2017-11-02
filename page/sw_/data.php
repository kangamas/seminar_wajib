<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
<?php
include '../../koneksi.php';
$event=mssql_query("select *from c_event where jenis='S005'");
$hevent=mssql_fetch_array($event);
$jenis=$hevent['jenis'];
$tgl=$hevent['tgl'];
$ket=$hevent['ket'];
$formattgl = date('d F Y', strtotime($tgl ));
$mysqlq = mssql_query("select s.npm,m.Nama,LEFT(m.FSJK,2) as prodi,s.tgl as tanggal,s.ket as tmp,s.rowid
                					from sertifikasi s,Mhs m 
                					where jenis='S005' and tgl='$tgl' and m.Npm=s.npm
									order by s.rowid desc");
	echo "<table class='table table-bordered' id='example1'>
	<thead>
	<tr>
		<th>NO</th>
		<th>NIM</th>
		<th>NAMA</th>
		<th>PRODI</th>
		<th>TANGGAL</th>
		<th>TEMPAT</th>
		<th>KETERANGAN</th>
	</tr>
	</thead>
    <tbody>";
    // $no=0;
	while ($z = mssql_fetch_array($mysqlq)) {
		$id[] = $z['npm'];
        $namamhs[]=$z['Nama'];
        $prodi[]=$z['prodi'];
        $tanggal[]=$z['tanggal'];
        $keterangan[]=$z['tmp'];
    }
    for($i=0; $i<count($id); $i++){
        $idmhs=$id[$i];
		?>
			<tr>
				<td><?=$i+1;?></td>
				<td><?=$id[$i];?></td>
				<td><?=$namamhs[$i];?></td>
				<td><?=$prodi[$i];?></td>
				<td><?=$tanggal[$i];?></td>
				<td><?=$keterangan[$i];?></td>
				<td>HADIR</td>
			</tr>
			
	<?php
	};
	?>
	</tbody>
	</table>

<script type="text/javascript">
	$(document).ready(function() {
			$('#example1').DataTable( {
			"scrollX": true,
			"paging": true,
        	"lengthChange": true,
        	"searching": true,
       		"ordering": true,
          	"info": true,
          	"autoWidth": true
			} );
		} );
	$(document).ready(function() {
			$('#example2').DataTable( {
				"scrollX": true,
				"paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
			} );
		} );
</script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>