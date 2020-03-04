<!doctype html>
<html lang="tr">
<head>

  <?php include("inc/mylibrary.php"); dahilEt("inc/head.php");

  dahilEt("inc/baglan.php");
  
  $ara=$_POST["aranan"];

  ?>
  <title>SSS | Street Books</title>

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
          <span class="wSmoke breadcrumb-item">Arama Sonucu</span>
        </nav>
      </div>

      <div class="row" >
        <div class="col-md-12">
          <h1 class="bold wSmoke text-left font"><?php yazdir($ara." için bulunan sonuçlar")?> </h1> 
        </div>
      </div>
    </section>

    <section style="background-color: whitesmoke; padding: 50px;">
      <div class="container">
        <?php
        $conn = mysqli_connect("localhost","root", "", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
        $sql=mysqli_query($conn,"SELECT * FROM kitaplar WHERE kitapAdi LIKE '$ara%'");
        $bul = mysqli_num_rows($sql);

        if($bul > 0) {
          while($yaz=mysqli_fetch_array($sql)) {
            echo '<div class="col-sm-6 col-md-4 col-lg-3">';
            echo '<div class="card-deck text-center">';
            echo '<div class="card">';
            echo '<a href="kitap-detay3.php?id='.$yaz['id'].'"><img class="card-img-top" src="assets/kk/'.$yaz['kitapKapak'].'" alt="'.$yaz['kitapAdi'].'"></a>';
            echo '<div class="card-body">';
            echo '<h6 class="card-title" style="margin-bottom:8px;"><a href="">'.$yaz['kitapAdi'].'</a></h6>';
            echo '<div class="aracizgi"></div>';
            echo '<div class="card-text" style="">';
            echo '<div class="mt-1 mb-2 detail-item"><a href="yazar-sayfasi">'.$yaz['yazarAdi'].'</a></div>';
            echo '<div class="detail-item">Roman</div>';
            echo '<div class="detail-item">'.$yaz['yayinEvi'].'</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<small class="text-muted text-left"> <span title="Sayfa Sayısı" style="float: left !important;"><i class="fa fa-book"></i> '.$yaz['sayfaSayisi'].'</span> <span title="Yorum Sayısı" style="float: right; !important;" ><i class="fa fa-comments-o"></i> '.$yaz['begen'].'</span> </small>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "<br>";
          echo "<div class='alert alert-danger' role='alert'><b>$ara</b> kelimesi ile ilgili bir sonuç bulunamadı.</div>";
        }
        ?>
      </div>
    </section>


    <section style="padding: 50px;">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="bold text-left">Ne Okusam?</h2>
          </div>
          <div class="col-md-6">
            <a href=""><h6 class="bold text-right">Tüm Okuma Listeleri</h6></a>
          </div>
        </div>
        <div class="row">

          <div class="col-md-4">
            <div class="card neokusam hover">
              <div class="card-body">
                <h5 class="card-title bold2">En İyi 50 Roman</h5>
                <h6 class="card-subtitle mb-2 text-muted">Bi' Kitap</h6>
                <p class="card-text">Sizler için seçmiş olduğumuz dünya eserlerinin arasından en iyi 50 roman.</p>
                <a href="#" class="card-link">İncele <i class="fa fa-long-arrow-right"></i> </a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card neokusam hover">
              <div class="card-body">
                <h5 class="card-title bold2">Bilim-Kurgu Klasikleri</h5>
                <h6 class="card-subtitle mb-2 text-muted">Bi' Kitap</h6>
                <p class="card-text">Sizler için seçmiş olduğumuz bilim kurgu klasiklerinin arasından en iyi 50'si.</p>
                <a href="#" class="card-link"><strong>İncele </strong><i class="fa fa-long-arrow-right"></i> </a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card neokusam hover">
              <div class="card-body">
                <h5 class="card-title bold2">Çok Satanlar</h5>
                <h6 class="card-subtitle mb-2 text-muted">Bi' Kitap</h6>
                <p class="card-text">2017 yılı içerisinde en çok satan 50 kitabı sizin için derledik .</p>
                <a href="#" class="card-link"><strong>İncele </strong><i class="fa fa-long-arrow-right"></i> </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="sss">
      <?php include("inc/footer.php") ?>
    </section>
  </body>
  </html>