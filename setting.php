<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<LINK REL="SHORTCUT ICON" HREF="favicon.ico">
  <head>
   
  </head>
  <body>
<?php
include "header.php";
$sql=mssql_query("select c.rowid,tahun,j.nama,tgl,ket,po,grp,prodi from c_event c,jenis j where c.jenis=j.jenis");
?>

      
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Setting Seminar Wajib</h3>
                </div><!-- /.box-header -->
                <form name="fsetting" id="fsetting" method="post" action="simpanset.php">
                <div class="box-body">
                <div class="row">
                  <div class="col-md-1">
                    <div class="form-group">
                      <label>Tahun</label>
                      <input type="text" name="txttahun" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Jenis Kegiatan</label>
                      <select class="form-control" style="width: 100%;" name="cmbjenis">
                        <option selected="selected" value="S00">-Pilih-</option>
                        <option value="S005">SEMINAR WAJIB</option>
                        <option value="S006">AMT</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Kelas</label>
                      <select class="form-control" style="width: 100%;" name="cmbgrp">
                        <option selected="selected" value="0">-Pilih-</option>
                        <option value="1">Reguler</option>
                        <option value="2">Non Reguler</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Prodi</label>
                      <select class="form-control" style="width: 100%;" name="cmbprodi">
                        <option selected="selected" value="??">-Pilih-</option>
                        <option value="AB">Administrasi Bisnis</option>
                        <option value="MI">Manajemen Informatika</option>
                        <option value="AK">Akuntansi</option>
                        <option value="KM">Hubungan Masyarakat</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label>Tanggal:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="txttgl" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tempat Seminar</label>
                      <input type="text" name="txtket" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>PO Seminar</label>
                      <input type="text" name="txtPO" class="form-control" placeholder="Enter ...">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" name="btnsimpan" value="Simpan" class="btn btn-danger">
                    </div>
                  </div>
                </div>
                </div><!-- /.box-body -->
                </form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                      <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>TAHUN</th>
                            <th>JENIS KEGIATAN</th>
                            <th width="2%">KELAS</th>
                            <th width="2%">PRODI</th>
                            <th>TANGGAL</th>
                            <th>TEMPAT</th>
                            <th width="10%">PO</th>
                            <!-- <th>Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($adadata = mssql_fetch_row($sql)) {
                          // $no=0;
                          list($id,$tahun,$jenis,$tgl,$ket,$po,$grp,$prodi) = $adadata;
                          $formattgl = date('d F Y', strtotime($tgl ));
                        ?>
                          <tr>
                            <td><?=$id;?></td>
                            <td><?=$tahun;?></td>
                            <td><?=$jenis;?></td>
                            <td><?=$grp;?></td>
                            <td><?=$prodi;?></td>
                            <td><?=$formattgl;?></td>
                            <td><?=$ket;?></td>
                            <td><?=$po;?></td>
                            <!-- <td><a href="#edit"><img src="images/edit.png"></a> 
                                <a href="#hapus"><img src="images/delete.png"></a>
                            </td> -->
                          </tr>
                        <?php
                          }
                        ?>
                        </tbody>
                        <tfoot>
                          
                        </tfoot>
                      </table>
                      </div>
                    </div>
                  </div>
                      
                  </div>
               </div>
              </div> <!-- box -->
            </div><!-- /.col -->
            
          </div><!-- /.row -->

        </section><!-- /.content -->
      
      </div><!-- /.content-wrapper -->
      
<!-- jQuery 2.1.4 -->
    
  </body>
</html>
