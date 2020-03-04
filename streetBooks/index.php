<!doctype html>
<html lang="tr">
<head>
  <?php include("inc/head.php"); include("inc/mylibrary.php") ?>
  <title>Street Books</title>
</head>
<body>
  <section id="cover">
    <?php
    ob_start();
    session_start();

    include ("inc/baglan.php");

    if (isset($_SESSION['oturum']))
      include("inc/menu2.php");
    else
      include("inc/menu.php");
    ?>    
    <div class="container text-center" style="margin-top: 170px;">
      <div class="row">
        <div class="col-md-1 hidden-xs"></div>
        <div class="col-md-10">
          <!-- <img class="mb-4" src="assets/img/logov321.png" style="height: 150px;"> -->
          <p class="girisMetni">street ~ books</p>
        </div>
        <div class="col-md-1 hidden-xs"></div>
      </div>

      <div class="row">
        <div class="col-md-3 hidden-xs"></div>
        <div class="col-md-6">
          <p class="girisAciklama">Sadece herkesin okuduğu kitapları okuyorsanız, sadece herkesin düşündüğü gibi düşünüyorsunuz demektir.<br> <b>William Styron</b></p> 
          
          <div id="animation">
            <a href="#motto" id="return-to-top" class="mt-3"><i class="fa fa-angle-down"></i></a>
          </div>
          
          
        </div><br>
        
        <div class="col-md-3 hidden-xs"></div>
        
      </div>
    </div>
  </section>

  <!-- <section class="motto2" id="motto">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <p class="motto" style="color: #B71C1C;">Günün Sözü</p>
            <small>- street books -</small>
            <hr>
            <h4 style="font-family: 'Fira Mono', monospace;">Paylaştığın senindir, biriktirdiğin değil.</h4>
        </div>
      </div>
    </div>
  </section> -->

  <section class="motto2 bgPng" id="motto">
    <div class="container">
      <div class="row ">

        <div class="col-md-12">
          <p class="motto" style="color: #B71C1C;">Daha Önce Bu Kitabı Okunuz Mu?</p>
          <hr>

          <?php

          $result = $conn->query("SELECT * FROM kitaplar ORDER BY id");

          $totalBook=$result->num_rows;

          $rastgele  = sayiVer(1,$totalBook);

          printf($rastgele);

          $baslik= mysqli_query($conn,"SELECT * FROM kitaplar WHERE id='$rastgele'") or die(mysqli_connect_error());
          while($deger=mysqli_fetch_array($baslik))
          {
            $id=$deger['id'];

            yazdir('<h3>'.$deger['kitapAdi'].'</h3>');
            yazdir('<h6>~'.$deger['yazarAdi'].'~</h6>');
            yazdir('<div class="detail-item">');
            vtCekYaz("kategoriler",$id,'kategoriAdi');
            //yazdir('<p class="mt-4">'.$deger['kategoriID'].'~</p>');
            yazdir('</div>');
            yazdir('<p class="mt-4">'.$deger['kitapHakkinda'].'~</p>');
            yazdir('<a href="detailBooks.php?id='.$deger['id'].'""><button type="button" class="btn btn-outline-dark">Günün Kitabını İncele</button></a>');
          }

          ?>

        </div>
      </div>
    </div>
  </section>

  <section class="sec">
    <div class="container">
      <h2 class="bold text-left">Son Eklenen Kitaplar</h2>
      <div class="row">

        <?php
        $baslik= mysqli_query($conn,'SELECT * FROM kitaplar ORDER BY id DESC LIMIT 6') or die(mysqli_connect_error());
        while($deger=mysqli_fetch_array($baslik))
        {
          $id=$deger['id'];
          $katid=$deger['kategoriID'];

          echo '<div class="col-sm-6 col-md-4 col-lg-2">';
          ECHO '<div class="card-deck text-center">';
          ECHO '<div class="card">';
          ECHO '<a href="detailBooks.php?id='.$deger['id'].'"><img class="card-img-top" src="assets/kk/'.$deger['kitapKapak'].'" alt="'.$deger['kitapKapak'].'"></a>';
          ECHO '<div class="card-body">';
          ECHO '<h6 class="card-title" style="margin-bottom:8px;"><a href="detailBooks.php?id='.$deger['id'].'">'.$deger['kitapAdi'].'</a></h6>';
          ECHO '<div class="aracizgi"></div>';

          #yazarAdı
          ECHO '<div class="card-text" style="">';
          ECHO '<div class="mt-1 mb-2 detail-item"><a href="yazar-sayfasi">'.$deger['yazarAdi'].'</a></div>';

          #kategori
          yazdir('<div class="detail-item">');
          vtCekYaz("kategoriler",$katid,'kategoriAdi');
          yazdir('</div>');
          
          #yayınEvi
          ECHO '<div class="detail-item">'.$deger['yayinEvi'].'</div>';
          ECHO '</div>';
          ECHO '</div>';
          ECHO '<div class="card-footer">';
          ECHO '<small class="text-muted text-left"> <span title="Sayfa Sayısı" style="float: left !important;"><i class="fa fa-book"></i> '.$deger['sayfaSayisi'].'</span> <span title="Tavsiye Eden Kişi Sayısı" style="float: right; !important;" ><i class="fa fa-comments-o"></i> '.$deger['begen'].'</span> </small>';
          ECHO '</div>';
          ECHO '</div>';
          ECHO '</div>';
          ECHO '</div>';

        }
        ?>

      </div>
    </div>
  </section>

  <section style="padding: 50px; background:linear-gradient(141deg, #9FCBDF 0%, #ffffff 51%, #71B0CE 75%) !important;">
    <div class="container">
      <h2 class="bold text-left">En Çok Tavsiye Edilen Kitaplar</h2>
      <div class="row">

        <?php
        $baslik= mysqli_query($conn,'SELECT * FROM kitaplar ORDER BY begen DESC LIMIT 4') or die(mysqli_connect_error());
        while($deger=mysqli_fetch_array($baslik))
        {

          $id=$deger['id'];

          echo '<div class="col-sm-6 col-md-4 col-lg-3">';
          ECHO '<div class="card-deck text-center">';
          ECHO '<div class="card">';
          ECHO '<a href="detailBooks.php?id='.$deger['id'].'"><img class="card-img-top" src="assets/kk/'.$deger['kitapKapak'].'" alt="'.$deger['kitapKapak'].'"></a>';
          ECHO '<div class="card-body">';
          ECHO '<h6 class="card-title" style="margin-bottom:8px;"><a href="detailBooks.php?id='.$deger['id'].'">'.$deger['kitapAdi'].'</a></h6>';
          ECHO '<div class="aracizgi"></div>';
          ECHO '<div class="card-text" style="">';
          ECHO '<div class="mt-1 mb-2 detail-item"><a href="yazar-sayfasi">'.$deger['yazarAdi'].'</a></div>';



          yazdir('<div class="detail-item">');
          vtCekYaz("kategoriler",$id,'kategoriAdi');
          yazdir('</div>');



          ECHO '<div class="detail-item">'.$deger['yayinEvi'].'</div>';


          ECHO '</div>';
          ECHO '</div>';
          ECHO '<div class="card-footer">';
          ECHO '<small class="text-muted text-left"> <span title="Sayfa Sayısı" style="float: left !important;"><i class="fa fa-book fa-lg"></i> '.$deger['sayfaSayisi'].'</span> <span title="Tavsiye Eden Kişi Sayısı" style="float: right; !important;" ><i class="fa fa-thumbs-o-up fa-lg"></i> '.$deger['begen'].'</span> </small>';
          ECHO '</div>';
          ECHO '</div>';
          ECHO '</div>';
          ECHO '</div>';

        }
        ?>

      </div>
    </section>


    

    <?php include("inc/neOkusam.php"); include("inc/footer.php"); ?>

  </body>
  </html>