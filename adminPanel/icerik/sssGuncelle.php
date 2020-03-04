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

    <title>SSS Güncelle | Street Book</title>
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
          SSS Güncelle
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> SSS İşlemleri</a></li>
          <li class="active">SSS Güncelle</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php"); ?>

        <?php
        if($_POST){
          $sssBaslik=$_POST["sssBaslik"];
          $sssicerik=$_POST["sssicerik"];

          @$gunc=mysqli_query($conn,"update sss set baslik='$sssBaslik', icerik='$sssicerik' where id='$_GET[sayfa]' ");

          if($gunc){
            echo "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h4><i class='icon fa fa-check'></i> BAŞARILI!</h4>
            Kayıt Başarıyla Güncellenmiştir.
            </div>"; 
            echo "<meta http-equiv='refresh' content='3'>"; }
          }

          if(@$sayfa=$_POST[sayfa]){
            $sayfa=$_POST[sayfa];
          }

          else{
            @$sayfa=$_GET[sayfa];
          }

          $sorgu=mysqli_query($conn,"select * from sss where id='$sayfa'");
          $bilgi=mysqli_fetch_array($sorgu);

          ?>

          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-exclamation"></i> Dikkat!</h4>
                <p>Kitap güncellemek için için ilk önce <b>Kayıtlı Tüm Kitaplar</b> tablosundaki [ <i class="fa fa-arrow-down"></i> ] simgesine tıklayınız. Ardından seçtiğiniz kitap bilgileri aşağıdaki forma doldurulacaktır. Gereken değişikliği yaptıktan sonra <b>Güncelle</b> butonuna tıklayıp güncelleme işlemini sonlandırın.</p>
              </div>
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Kayıtlı Tüm Kitaplar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <th>Gönder</th>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                      </tr>
                      <?php
                      $baslik= mysqli_query($conn,'Select * from sss') or die(mysqli_connect_error());
                      while($deger=mysqli_fetch_array($baslik))
                      {
                        echo '<tr>';
                        echo '<td><a href="sssGuncelle.php?sayfa='.$deger['id'].'" >[ <i class="fa fa-arrow-down"></i> ]</a></td>';
                        echo '<td>'.$deger['id'].'</td>';
                        echo '<td>'.$deger['baslik'].'</td>';
                        echo '<td>'.$deger['icerik'].'</td>';
                        echo '</tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>

              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Kitap Ekle</h3>
                </div>
                <form class="form-horizontal" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Başlık</label>
                      <div class="col-sm-10">
                        <input type="text" name="sssBaslik" class="form-control" placeholder="Kitap Adı" required="" value="<?php echo ''.$bilgi['baslik'].''; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">İçerik</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" type="text" rows="4" name="sssicerik" placeholder="Kitap Hakkında ..." required=""><?php echo ''.$bilgi['icerik'].''; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Güncelle</button>
                  </div>
                  <!-- /.box-footer -->
                </form>
              </div>
            </section>

          </div>


        </section>

      </div>

      <?php } include("../inc/footer.php"); ?>
    </div>
  </body>
  </html>