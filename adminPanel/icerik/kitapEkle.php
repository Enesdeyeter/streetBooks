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

    <title>Kitap Ekle | Street Book</title>
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
          Kitap Ekle
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Kitap İşlemleri</a></li>
          <li class="active">Kitap Ekle</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php"); ?>

        <div class="row">

          <section class="col-lg-12 connectedSortable">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Kitap Ekle</h3>
              </div>

              <!-- <?php
              if ($_POST) {
                $kitapAdi=$_POST["kitapAdi"];
                $yazarAdi=$_POST["yazarAdi"];
                $kitapHakkinda=$_POST["kitapHakkinda"];
                $yayinEvi=$_POST["yayinEvi"];
                $kategori=$_POST['kategori'];
                $sayfaSayisi=$_POST["sayfaSayisi"];


                $ekle=mysql_query("INSERT INTO kitaplar (kitapAdi,yazarAdi,kitapHakkinda,yayinEvi,kategori,sayfaSayisi) VALUES ('$kitapAdi','$yazarAdi','$kitapHakkinda','$yayinEvi','$kategori','$sayfaSayisi')") or die (mysql_Error());

                if ($ekle) {
                  echo "<div style='margin:20px 50px 20px 50px' class='alert alert-success text-center'><h1>Başarılı<br></h1><br><a href='kitaplar.php'>Tıklayınız...</a></div>";
                }
                else
                  echo "<h2 class='red text-center'>Hata!</h2>";

              }

              else{
                ?> -->
                <form class="form-horizontal" enctype="multipart/form-data" action="kitapYolla.php" method="POST" onsubmit="return confirm('Onaylıyor musunuz ?');">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kitap Adı</label>
                      <div class="col-sm-10">
                        <input type="text" name="kitapAdi" class="form-control" placeholder="Kitap Adı" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yazar Adı</label>
                      <div class="col-sm-10">
                        <input type="text" name="yazarAdi" class="form-control" placeholder="Yazar Adı" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kitap Hakkında</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" type="text" name="kitapHakkinda" placeholder="Kitap Hakkında ..." required=""></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yayın Evi</label>
                      <div class="col-sm-10">
                        <input type="text" name="yayinEvi" class="form-control" placeholder="Yayın Evi" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="kategori">
                          <option value="1">Roman</option>
                          <option value="2">Hikaye</option>
                          <option value="3">Edebiyat</option>
                          <option value="4">Bilim-Kurgu</option>
                          <option value="5">Diğer</option>
                        </select>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Sayfa Sayısı</label>
                      <div class="col-sm-10">
                        <input type="number" name="sayfaSayisi" class="form-control" placeholder="Sayfa Sayısı">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kitap Kapak Resmi</label>
                      <div class="col-sm-10">
                        <input type="file" name="kitapKapak" class="form-control">
                        <span class="help-block">Sadece <b>.jpg .jpeg .png</b> uzantılı dosyaları yükleyebilirsiniz.</span>
                      </div>

                      

                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Kitap Ekle</button>
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
