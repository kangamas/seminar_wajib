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
?>   <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><i class="fa fa-cog"></i></h3>
                  <p>Setting</p>
                </div>
                <div class="icon">
                  <i class="fa fa-cog"></i>
                </div>
                <a href="setting.php" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><i class="fa fa-file"></i></h3>
                  <p>Daftar Hadir</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text-o"></i>
                </div>
                <a href="laphadir.php" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><i class="fa fa-money"></i></h3>
                  <p>Lap. Pembayaran</p>
                </div>
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>
                <a href="lapbayar.php" class="small-box-footer">Click <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><i class="fa fa-user"></i></h3>
                  <p>Absensi</p>
                </div>
                <div class="icon">
                  <i class="fa fa-pencil"></i>
                </div>
                <a href="page/sw" class="small-box-footer" target="blank">Click <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      
      </div><!-- /.content-wrapper -->

  </body>
</html>
