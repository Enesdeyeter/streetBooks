<?php
if(isset($_GET['id'])){
  $gelenid=$_GET['id'];

}

else {
  header("location:404.php");
}
?>

<!doctype html>
<html lang="tr">
<head>

  <?php include("inc/mylibrary.php"); include("inc/head.php");

  include("inc/baglan.php");
  ?>
  

  <?php
  yazdir('<title>');
  vtCekYaz("kategoriler",$gelenid,'kategoriAdi');
  yazdir(' Kategorisi | Street Books</title>');
  ?>

</head>
<body>
  <section id="sss">
    <?php
    ob_start();
    session_start();

    include ("inc/baglan.php");

    if (isset($_SESSION['oturum']))
      include("inc/menu2.php");
    else
      include("inc/menu.php");
    ?>
    <div class="container" style="padding: 50px;">
      <div class="row">
        <nav class=" breadcrumb">
          <a class="wSmoke breadcrumb-item" href="#">Anasayfa</a>
          <span class="wSmoke breadcrumb-item">Kategoriler</span>
        </nav>
      </div>

      <div class="row" >
        <div class="col-md-12">

          <?php
          yazdir('<h1 class="bold wSmoke text-left font">');
          vtCekYaz("kategoriler",$gelenid,'kategoriAdi');
          yazdir(' Kategorisi</h1> ');
          ?>
        </div>
      </div>
    </section>

    <section style="background-color: whitesmoke; padding: 50px;">
      <div class="container">
        <div class="row">

         <?php
         $say=2;
         $kk=1;

         $cek=mysqli_query($conn,"SELECT * FROM kitaplar WHERE kategoriID='$gelenid'");
         while($liste=mysqli_fetch_array($cek)){

          // vtCekYaz2("kitaplar",$gelenid,'kategoriID');
          // echo $say;

          // echo $liste[$say];

          echo '<div class="col-sm-6 col-md-4 col-lg-2">';
          echo '<div class="card-deck text-center">';
          echo '<div class="card">';
          echo '<a href="detailBooks.php?id='.$liste[$say-2].'"><img class="card-img-top" src="assets/kk/'.$liste[$kk].'" alt="'.$liste[$kk].'"></a>';
          echo '<div class="card-body">';

          #kitapAdı
          yazdir('<h6 class="card-title" style="margin-bottom:8px;"><a href="detailBooks.php?id='.$liste[$say-2].'">');
          echo $liste[$say];
          yazdir('</a></h6>');

          echo '<div class="aracizgi"></div>';
          echo '<div class="card-text" style="">';

          #yazarAdı
          yazdir('<div class="mt-1 mb-2 detail-item"><a href="">');
          echo $liste[$say+1];
          yazdir('</a></div>');

          #kategoriAdı
          yazdir('<div class="detail-item">');
          vtCekYaz("kategoriler",$gelenid,'kategoriAdi');
          yazdir('</div>');

          #yayinEvi
          yazdir('<div class="detail-item">');
          echo $liste[$say+3];
          yazdir('</div>');

          echo '</div>';
          echo '</div>';
          echo '<div class="card-footer">';

          #sayfaSayisi
          yazdir('<small class="text-muted text-left"> <span title="Sayfa Sayısı" style="float: left !important;"><i class="fa fa-book"></i> ');
          echo $liste[$say+5];
          yazdir('</span>');

          #yorumSayisi
          yazdir('<span title="Tavsiye Eden Kişi Sayısı" style="float: right; !important;" ><i class="fa fa-thumbs-o-up"></i> ');
          echo $liste[$say+6];
          yazdir('</span> </small>');

          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?> 

      </div>
    </div>
  </section>

  <section>
    <?php include("inc/neOkusam.php"); include("inc/footer.php"); ?>
  </section>
</body>
</html>