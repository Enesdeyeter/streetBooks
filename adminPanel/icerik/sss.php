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

    <title>SSS | Street Book</title>
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
          SSS
          <small>Street Books Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> SSS İşlemleri</a></li>
          <li class="active">SSS</li>
        </ol>
      </section>

      <section class="content"> 
        <?php include("../inc/widget.php") ?>

        <div class="row">

          <section class="col-lg-12 connectedSortable">

            <div class="box box-success">
              <div class="box-header">
                <h3 class="box-title">Tüm SSS'ler</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Başlık</th>
                      <th>İçerik</th>
                    </tr>
                    <?php
                    $baslik= mysqli_query($conn,'Select * from sss') or die(mysqli_connect_error());
                    while($deger=mysqli_fetch_array($baslik))
                    {
                      echo '<tr>';
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

          </section>

        </div>


      </section>

    </div>

    <?php include("../inc/footer.php"); }?>
  </div>
</body>
</html>
