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
                        <th>BAYAR</th>
                        <th>TGL BAYAR</th>
                        <th>KET</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
				//	$sql=mssql_query("select npm,nama,fsjk,grp,tlp_m from mhs where sdosen='$sdosen' and stakd=1 order by npm,nama");
                    $sql2 = mssql_query("select t.dari,m.Nama,LEFT(m.FSJK,2) as prodi,t.bayar,t.bayar_tg,t.ket from t_byrlain t,Mhs m
where jenisbyr='B09' and m.Npm=t.dari
and RIGHT(id,4)>=4315 and bayar_tg >='2016-11-01'
order by 1");	
                                        					
            					while($z = mssql_fetch_array($sql2)){
            						$id[] = $z['dari'];
            						$namamhs[]=$z['Nama'];
                        $prodi[]=$z['prodi'];
                        $bayar[]=$z['bayar'];
                        $bayar_tg[]=$z['bayar_tg'];
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
                         <td><?=$bayar[$i];?></td>
                         <td><?=$bayar_tg[$i];?></td>
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
