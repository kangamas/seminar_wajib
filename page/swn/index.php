<?php
include '../../koneksi.php';

$event=mssql_query("select *from c_event where jenis='S005'");
$hevent=mssql_fetch_array($event);
$jenis=$hevent['jenis'];
$tgl=$hevent['tgl'];
$ket=$hevent['ket'];
$formattgl = date('d F Y', strtotime($tgl ));
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
    <link rel="stylesheet" href="style.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav layout-boxed">
  

    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
                  <!-- The user image in the navbar-->
                  
              <a href="index.php" class="navbar-brand"><b>ABSENSI</b> Seminar</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <!-- Main content -->
          <section class="content">
            <div class="box box-default">
            <div class="box-body">
            <div id="form-area">
	            <h3>Input Data Mahasiswa</h3>
	            <form id="form-input" method="POST" action="action.php?a=input">
	            <p>
	                <label for="nim">NIM</label>
	                <input type="text" name="nim" id="nim" size="10" maxlength="10" autofocus>
	                <!-- <label>&nbsp;</label> -->
	                <button type="submit" name="simpan">Tambahkan Data</button>
	                <button type="reset">Batal</button>
	                <span id="loader" style="display:none"><img src="loader.gif"> Mengirim...</span>
	            </p>
	            <p>
	                <!-- <label for="nama">Nama</label> -->
	                <input type="text" name="nama" id="nama" size="40" maxlength="50" hidden>
	            </p><p>
	                <!-- <label for="jk">Jenis Kelamin</label> -->
	                <select name="jk" id="jk" hidden>
	                    <option></option>
	                    <option value="L">Laki-Laki</option>
	                    <option value="P">Perempuan</option>
	                </select>
	            </p><p>
	                <!-- <label for="nim">Alamat</label> -->
	                <input type="text" name="alamat" id="alamat" hidden/>
	            </p>
	            <p>
	                <!-- <label>&nbsp;</label>
	                <button type="submit" name="simpan">Tambahkan Data</button>
	                <button type="reset">Batal</button>
	                <span id="loader" style="display:none"><img src="loader.gif"> Mengirim...</span> -->
	            </p>
	            </form>
	        </div>
	         <div id="result" style="display:none"></div>
        
		    <table id="tabel-data">
		        <thead>
		            <tr>
		                <th width="30px">NO</th><th>NIM</th><th>NAMA</th>
		                <th width="50px">PRODI</th><th width="120px">TANGGAL</th><th>TEMPAT</th>
		            </tr>
		        </thead>
		        <!-- area untuk menampilkan data. data akan di-load via ajax -->
		        <tbody id="data-area"></tbody>
		    </table>
                
                
            </div>

             
            </div><!-- /.box -->
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong><a href="#"></a></strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
   	<script type="text/javascript" src="jquery-1.11.1.min.js"></script>		
    <script type="text/javascript" src="myscript.js"></script>	
    <!-- <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script> -->
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
    
  </body>
</html>
