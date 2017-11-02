<?php
ob_start();
?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
  <?php
include "header.php";
?>
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Biaya Pendidikan Mahasiswa Bimbingan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form name="fkons" method="post" action="#">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       	<th>No</th>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>KETERANGAN</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
				//	$sql=mssql_query("select npm,nama,fsjk,grp,tlp_m from mhs where sdosen='$sdosen' and stakd=1 order by npm,nama");
                    $sql2 = mssql_query("select s.npm as nim,m.nama as nm,left(m.fsjk,2) as prodi,s.ket as ket from sertifikasi s,mhs m 
                      where jenis='s005' and s.tgl='2016-12-06' and m.npm=s.npm");	
                                        					
            					while($z = mssql_fetch_array($sql2)){
            						$id[] = $z['nim'];
            						$namamhs[]=$z['nm'];
                        $prodi[]=$z['prodi'];
                        $ket[]=$z['ket'];
            					}
            					for($i=0; $i<count($id); $i++){
                        $idmhs=$id[$i];
            
            					?>
                       <tr>
                         <td><?=$i+1;?></td>
                         <td><?=$id[$i];?></td>
                         <td><?=$namamhs[$i];?></td>
                         <td><?=$prodi[$i];?></td>
                         <td><?=$ket[$i];?></td>                    
                        </tr>
                      <?php
            					}
            					?>  
                    </tbody>
                    <tfoot>
                      <tr></tr>
                    </tfoot>
                  </table>
                  </form>
                </div><!-- /.box-body -->
               </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      
      </div><!-- /.content-wrapper -->
  
  </body>
</html>
