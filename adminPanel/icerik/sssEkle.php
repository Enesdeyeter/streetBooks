<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: ../goremez.php");
}

else{
  ?>

  <!DOCTYPE html>
  <html>
  <head>

    <title>SSS Ekle | Street Book</title>
    <?php include("../inc/head.php"); include("../inc/baglan.php"); ?>
  </head>
  <body class="hold-transition skin-red-light fixed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <?php include("../inc/header.php"); ?>
      </header>

      <aside class="main-sidebar">
       <?php include("../inc/menu.php"); ?>
     </aside>

     <div class="content-wrapper">    
      <section class="content-header">
        <h1>
          SSS Ekle
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> SSS İşlemleri</a></li>
          <li class="active">SSS Ekle</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php"); ?>

        <div class="row">

          <section class="col-lg-12 connectedSortable">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">SSS Ekle</h3>
              </div>

              <?php
              if ($_POST) {
                $sssBaslik=$_POST["sssBaslik"];
                $sssicerik=$_POST["sssicerik"];


                $ekle=mysqli_query($conn,"INSERT INTO sss (baslik,icerik) VALUES ('$sssBaslik','$sssicerik')") or die (mysqli_connect_Error());

                if ($ekle) {
                  echo "<div style='margin:20px 50px 20px 50px' class='alert alert-success text-center'><h1>Başarılı<br></h1><br><a href='sss.php'>Tıklayınız...</a></div>";
                }
                else
                  echo "<h2 class='red text-center'>Hata!</h2>";

              }

              else{
                ?>
                <form class="form-horizontal" enctype="multipart/form-data" action="" method="POST" onsubmit="return confirm('Onaylıyor musunuz ?');">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">SSS Başlık</label>
                      <div class="col-sm-10">
                        <input type="text" name="sssBaslik" class="form-control" placeholder="SSS Başlık" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">SSS İçerik</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" type="text" name="sssicerik" placeholder="SSS İçerik ..." required=""></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">SSS Ekle</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
               <!-- <?php } ?>-->
              </div>
            </section>

          </div>


        </section>

      </div>

      <?php } include("../inc/footer.php"); ?>
    </div>
  </body>
  </html>
