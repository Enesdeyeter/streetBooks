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

    <title>Kitap Güncelle | Street Book</title>
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
          Kitap Güncelle
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Kitap İşlemleri</a></li>
          <li class="active">Kitap Güncelle</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php"); ?>

        <?php
        if($_POST){
          $kitapAdi=$_POST["kitapAdi"];
          $yazarAdi=$_POST["yazarAdi"];
          $kitapHakkinda=$_POST["kitapHakkinda"];
          $yayinEvi=$_POST["yayinEvi"];
          $kategori=$_POST['kategoriID'];
          $sayfaSayisi=$_POST["sayfaSayisi"];

          @$gunc=mysqli_query($conn,"update kitaplar set kitapAdi='$kitapAdi', yazarAdi='$yazarAdi', kitapHakkinda='$kitapHakkinda', yayinEvi='$yayinEvi', kategoriId='$kategori', sayfaSayisi='$sayfaSayisi' where id='$_GET[sayfa]' ");

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

          $sorgu=mysqli_query($conn,"select * from kitaplar where id='$sayfa'");
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
                        <th>Kitap Adı</th>
                        <th>Yazar Adı</th>
                        <th style="width: 60%;">Kitap Hakkında</th>
                        <th>Yayın Evi</th>
                        <th>Kategori</th>
                        <th>Sayfa Sayisi</th>
                      </tr>
                      <?php
                      $baslik= mysqli_query($conn,'Select * from kitaplar order by id desc') or die(mysqli_connect_error());
                      while($deger=mysqli_fetch_array($baslik))
                      {
                        echo '<tr>';
                        echo '<td><a href="kitapGuncelle.php?sayfa='.$deger['id'].'" >[ <i class="fa fa-arrow-down"></i> ]</a></td>';
                        echo '<td>'.$deger['id'].'</td>';
                        echo '<td>'.$deger['kitapAdi'].'</td>';
                        echo '<td>'.$deger['yazarAdi'].'</td>';
                        echo '<td>'.$deger['kitapHakkinda'].'</td>';
                        echo '<td>'.$deger['yayinEvi'].'</td>';
                        echo '<td>'.$deger['kategoriID'].'</td>';
                        echo '<td>'.$deger['sayfaSayisi'].'</td>';
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
                      <label class="col-sm-2 control-label">Kitap Adı</label>
                      <div class="col-sm-10">
                        <input type="text" name="kitapAdi" class="form-control" placeholder="Kitap Adı" required="" value="<?php echo ''.$bilgi['kitapAdi'].''; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yazar Adı</label>
                      <div class="col-sm-10">
                        <input type="text" name="yazarAdi" class="form-control" placeholder="Yazar Adı" required="" value="<?php echo ''.$bilgi['yazarAdi'].''; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kitap Hakkında</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" type="text" rows="5" name="kitapHakkinda" placeholder="Kitap Hakkında ..." required=""><?php echo ''.$bilgi['kitapHakkinda'].''; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yayın Evi</label>
                      <div class="col-sm-10">
                        <input type="text" name="yayinEvi" class="form-control" placeholder="Yayın Evi" required="" value="<?php echo ''.$bilgi['yayinEvi'].''; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="kategoriID">
                          <option selected="<?php echo ''.$bilgi['kategoriID'].''; ?>" value="<?php echo ''.$bilgi['kategoriID'].''; ?>"><?php echo ''.$bilgi['kategoriID'].''; ?></option>
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
                        <input type="number" name="sayfaSayisi" class="form-control" placeholder="Sayfa Sayısı" value="<?php echo ''.$bilgi['sayfaSayisi'].''; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Kitap Kapak Resmi</label>
                      <div class="col-sm-10">
                        <input type="file" disabled="" class="form-control" placeholder="Sayfa Sayısı">
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