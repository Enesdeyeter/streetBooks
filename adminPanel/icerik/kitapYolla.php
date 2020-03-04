<?php 

## Uzantı Kontrolleri
  $uzanti=     array('image/jpeg','image/jpg','image/png'); 
  
## Aynı Dizinde Bulunan Resimler Klasörüne Kaydet 
  $dizin=     "../../dr/assets/kk/"; 
  if(@in_array(strtolower($_FILES['kitapKapak']['type']), $uzanti)){

    move_uploaded_file($_FILES['kitapKapak']['tmp_name'],"$dizin/{$_FILES['kitapKapak']['name']}"); 
    
  ## Veritabanına Bağlanalım ## 
    #@$baglan  =   mysql_connect("localhost","niksayaccom",'Password1') or die ('Sunucuya Bağlanamadım.'); 
    #@$asd = mysql_select_db("NIKSAYAC",$baglan) or die ('Veritabanına Bağlanamadım !'); 
    @include("../inc/baglan.php");
    @include("../inc/head.php");
  ## Dosya İsmimizi Veritabanına Yazdıralım. ## 

    mysqli_query($conn,"SET NAMES utf8"); 
    mysqli_query($conn,"SET CHARACTER SET utf8"); 
    mysqli_query($conn,"SET COLLATION_CONNECTION = 'utf8_general_ci'"); 
  ## Türkçe Karakter Hatası 

    $db   = $_FILES['kitapKapak']['name'];

    $kitapAdi=$_POST["kitapAdi"];
    $yazarAdi=$_POST["yazarAdi"];
    $kitapHakkinda2=$_POST["kitapHakkinda"];
    $kitapHakkinda=htmlspecialchars($kitapHakkinda2,ENT_QUOTES);
    $yayinEvi=$_POST["yayinEvi"];
    $kategori=$_POST['kategori'];
    $sayfaSayisi=$_POST["sayfaSayisi"];

    $begen=0;


  ## Resmimizin Adını Alalım 
    #$ekle=     mysql_query("INSERT INTO kitaplar (kitapKapak,baslik,icerik) VALUES ('$db','$basliktr','$iceriktr')") or die (mysql_Error());

    $ekle=mysqli_query($conn,"INSERT INTO kitaplar (kitapKapak,kitapAdi,yazarAdi,kitapHakkinda,yayinEvi,kategoriID,sayfaSayisi,begen) VALUES ('$db','$kitapAdi','$yazarAdi','$kitapHakkinda','$yayinEvi','$kategori','$sayfaSayisi','$begen')") or die (mysqli_connect_Error());
    ?> 

    <head>
      <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    </head>
    <body class="hold-transition login-page" style="background: #dd4b39 url(../cartographer.png) repeat; color:white">
      <div class="login-box" style="width: 600px;">
        <div class="login-logo">
          <a href="index.php" style="color:whitesmoke"><b>Kitap Başarıyla Eklendi.</b></a><br><br>
          <small>Yönlendiriliyorsunuz.</small>
          <?php header("Refresh: 4; url=kitapEkle.php"); ?>
        </div>
      </div>
    </body>
    
    <?php
  }
  else{

    echo "<head>";
      echo "<link rel='stylesheet' href='bower_components/bootstrap/dist/css/bootstrap.min.css'>";
      echo "<link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>";
    echo "</head>";

    echo "<body class='hold-transition login-page' style='background: #dd4b39 url(../cartographer.png) repeat; color:white'>";
      echo "<div class='login-box' style='width: 600px;'>";
        echo "<div class='login-logo'>";
          echo "<a href='index.php' style='color:whitesmoke'><b>Hata!</b></a><br>";
          echo "<p>Bir şeyler yanlış gitti.<br>Tekrar yüklemeyi deneyin.</p><br>";
          echo "<small>Yönlendiriliyorsunuz.</small>";
            header('Refresh: 4; url=kitapEkle.php');
        echo "</div>";
      echo "</div>";
    echo "</body>";
  } 
  ?>