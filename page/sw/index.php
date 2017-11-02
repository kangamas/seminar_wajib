<?php
// error_reporting(0);
include '../../koneksi.php';
$event=mssql_query("select *from c_event where jenis='S005' and grp=1 and prodi='AB'");
				$hevent=mssql_fetch_array($event);
				$jenis=$hevent['jenis'];
				$tgl=$hevent['tgl'];
				$ket=$hevent['ket'];
				$formattgl = date('d F Y', strtotime($tgl ));
$mysqlq = mssql_query("select s.npm,m.Nama,LEFT(m.FSJK,2) as prodi,s.tgl as tanggal,jam,s.ket as tmp,s.rowid
				                					from sertifikasi s,Mhs m 
				                					where jenis='S005' and tgl='$tgl' and m.Npm=s.npm
													order by s.rowid desc");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SW Absensi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Icon Utk page -->
    <LINK REL="SHORTCUT ICON" HREF="favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav layout-boxed">
<div class="wrapper">
	<header class="main-header">
		<nav class="navbar navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand"><b>ABSENSI</b> Seminar</a>
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		              <i class="fa fa-bars"></i>
		            </button>
				</div>
				<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
					<ul class="nav navbar-nav"></ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="content-wrapper">
		<div class="container">
			<section class="content">
				<div class="box box-default">
					<div class="box-body">
						<form id="myForm" method="post" action="proses.php">
							<table>
								<tr>
			                      <td width="200"><label>Silahkan Masukan NIM Anda :</label></td>
			                      <td><input name="nim" id="nim" size="30" type="text" autofocus/></td>
			                      <td align="center" width="100"><input type="submit" value="Submit" class="btn btn-danger" /></td>
			                      <td><div id="info"></div></td>
			                    </tr>
							</table>
						</form>
				<!-- <div class="box-body">	 -->
						<div class="row">
						<div class="col-md-12">
							<table id="example1" class="table table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>NO</th>
										<th>NIM</th>
										<th width="40%">NAMA</th>
										<th>PRODI</th>
										<th width="15%">TANGGAL</th>
										<th>JAM</th>
										<th width="20%">TEMPAT</th>
										<th>KETERANGAN</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$no=1;
								while ($z = mssql_fetch_array($mysqlq)) {
									$id = $z['npm'];
									$namamhs=$z['Nama'];
									$prodi=$z['prodi'];
									$tanggal=$z['tanggal'];
									$keterangan=$z['tmp'];
									$jam=$z['jam'];
									$formattgl2 = date('d F Y', strtotime($tanggal ));
								?>
									<tr>
										<td><?=$no++;?></td>
										<td><?=$id;?></td>
										<td><?=$namamhs;?></td>
										<td><?=$prodi;?></td>
										<td><?=$formattgl2;?></td>
										<td><?=$jam;?></td>
										<td><?=$keterangan;?></td>
										<td>HADIR</td>
									</tr>			
								<?php
								}
								?>
								</tbody>
							</table>
						</div>
						</div>
				<!-- </div> -->
					</div>
				</div>
			</section>
		</div>
	</div>
	
	<footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong><a href="#"></a></strong> All rights reserved.
      </div><!-- /.container -->
    </footer>
</div>
	</body>


<!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- // <script type="text/javascript" src="../../jquery-2.2.0.min.js"></script> -->
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    
    <!-- Page script -->
    
<script type="text/javascript">
	$(document).ready(function() {
			$('#example1').DataTable( {
			"scrollX": true,
			"paging": true,
        	"lengthChange": true,
        	"searching": true,
       		"ordering": false,
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
</body>
</html>