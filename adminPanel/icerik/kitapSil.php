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

    <title>Kitap Sil | Street Book</title>
    <?php include("../inc/head.php") ?>
  </head>
  <body class="hold-transition skin-red-light fixed sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <?php include("../inc/header.php"); ?>
      </header>

      <aside class="main-sidebar">
       <?php include("../inc/menu.php") ?>
     </aside>

     <div class="content-wrapper">    
      <section class="content-header">
        <h1>
          Kitap Sil
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Kitap İşlemleri</a></li>
          <li class="active">Kitap Sil</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php") ?>

        <div class="row">

          <section class="col-lg-12 connectedSortable">
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-exclamation"></i> Dikkat!</h4>
              <p>Silme butonu sorgulamadan siler. Bu durumu göz önünde bulundurarak silme işlemini gerçekleştiriniz.</p>
            </div>

            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Kayıtlı Kitapları Sil</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>Sil</th>
                      <th>Resim</th>
                      <th>ID</th>
                      <th>Kitap Adı</th>
                      <th>Yazar Adı</th>
                      <th style="width: 60%;">Kitap Hakkında</th>
                      <th>Yayın Evi</th>
                      <th>Kategori</th>
                      <th>Sayfa Sayisi</th>
                    </tr>

                    <?php

                    $baslik= mysqli_query($conn,'Select * from kitaplar') or die(mysqli_connect_error());
                    while($deger=mysqli_fetch_array($baslik))
                    {



                      echo '<div class="modal fade" id="kitapKapak" tabindex="-1" role="dialog" aria-hidden="true">';
                      echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                      echo '<div class="modal-content">';
                      echo '<div class="modal-body text-center">';
                      echo '<img src="../../dr/assets/kk/'.$deger['kitapKapak'].'">'; #çalışmıyor
                      echo '</div>';
                      echo '<div class="modal-footer">';
                      echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';


                      echo '<tr>';
                      echo '<td><a href="kitapDelete.php?id='.$deger['id'].'"><small class="label bg-red">X</small></a> </td>';
                      echo '<td><a data-toggle="modal" data-target="#kitapKapak"><small class="label bg-green"><i class="fa fa-eye"></i></small></a></td>';
                      echo '<td>'.$deger['id'].'</td>';
                      echo '<td>'.$deger['kitapAdi'].'</td>';
                      echo '<td>'.$deger['yazarAdi'].'</td>';
                      echo '<td>'.$deger['kitapHakkinda'].'</td>';
                      echo '<td>'.$deger['yayinEvi'].'</td>';
                      echo '<td>'.$deger['kategori'].'</td>';
                      echo '<td>'.$deger['sayfaSayisi'].'</td>';

                      echo '</tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>

          </section>

        </div>


      </section>

    </div>

    <?php include("../inc/footer.php"); }?>
  </div>
</body>
</html>
