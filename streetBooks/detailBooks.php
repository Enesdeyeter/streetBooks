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
  <!-- disqus yorum sistemi -->
  <script id="dsq-count-scr" src="//streetbooks.disqus.com/count.js" async></script>

  <?php include("inc/mylibrary.php"); include("inc/head.php");  ?>

  <!-- sayfaTitle -->
  <?php
  yazdir('<title>');
  vtCekYaz("kitaplar",$gelenid,'kitapAdi');
  yazdir(' | Street Books</title>');
  ?>

</head>
<body>
  <section>
    <?php
    ob_start();
    session_start();

    if (isset($_SESSION['oturum']))
      dahilEt("inc/menu2.php");
    else
      dahilEt("inc/menu.php");
    ?>
    <div class="container" style="padding: 45px;">
      <div class="row">
        <nav class="breadcrumb">
          <a class="breadcrumb-item" href="#">Kitaplar</a>

          <?php
          $sql=mysqli_query($conn,"select * from kitaplar where id='$gelenid' ");
          while($row=mysqli_fetch_array($sql)){
            $kat_id=$row['kategoriID'];

            $kat_ara=mysqli_query($conn,"select * from kategoriler where id='$kat_id'");
            while($bul=mysqli_fetch_array($kat_ara)){

             yazdir('<a class="breadcrumb-item" href="categories.php?id='.$bul['id'].'">');
             echo $bul["kategoriAdi"];
             yazdir('</a>');
           }
         }

         yazdir('<span class="breadcrumb-item bold2">');
         vtCekYaz("kitaplar",$gelenid,'kitapAdi');
         yazdir('</span>');
         ?>
       </nav>
     </div>

     <div class="row" >
      <div class="col-md-6">
        <?php
        yazdir('<h1 class="bold KA text-left">');
        vtCekYaz("kitaplar",$gelenid,'kitapAdi');
        yazdir('</h1>');
        ?>
      </div>
      <div class="col-md-6 boldFav" style="line-height: 55px; color:#212121;">
        <div class="row">
          <div class="text-right">
            <!-- <a href="" ><i class="fa fa-heart"></i> favorilerime ekle</a> -->
          </div>
        </div>
      </div>
    </div>

    <div class="row text-center">
      <div class="col-md-6" style="margin-bottom: 20px;">
        <?php  
      #kapakResmi
        yazdir('<img class="img-thumbnail kitapDetayKapak hover" src="assets/kk/');
        vtCekYaz("kitaplar",$gelenid,'kitapKapak');
        yazdir('"></img>');
        ?>
      </div>

      <div class="col-md-6">
        <div class="list-group">

          <?php
        #yazarAdi
          yazdir('<button type="button" class="list-group-item list-group-item-action text-left"><span class="bold2">Yazar: </span>');
          vtCekYaz("kitaplar",$gelenid,'yazarAdi');
          yazdir('</button>');

        #kategoriAdi
          yazdir('<button type="button" class="list-group-item list-group-item-action text-left"><span class="bold2">Türü: </span>');
          $sql=mysqli_query($conn,"select * from kitaplar where id='$gelenid' ");
          while($row=mysqli_fetch_array($sql)){
            $kat_id=$row['kategoriID'];

            $kat_ara=mysqli_query($conn,"select * from kategoriler where id='$kat_id'");
            while($bul=mysqli_fetch_array($kat_ara)){


             yazdir('<a class="breadcrumb-item" href="categories.php?id='.$bul['id'].'">');
             echo $bul["kategoriAdi"];
             yazdir('</a>');
           }
         }
         yazdir('</button>');

       #sayfaSayisi
         yazdir('<button type="button" class="list-group-item list-group-item-action text-left"><span class="bold2">Sayfa Sayısı: </span>');
         vtCekYaz("kitaplar",$gelenid,'sayfaSayisi');
         yazdir('</button>');

         if(isset($_POST['like'])) {
          $sql = "UPDATE kitaplar set begen = begen+1 where id='$gelenid'";
          $result=mysqli_query($conn,$sql);
        }

        if(isset($_POST['unlike'])) {
          $sql = "UPDATE kitaplar set begen = begen-1 where id='$gelenid'";
          $result=mysqli_query($conn,$sql);
        }
        ?>

        <div>
          <h5 class="bold2 text-left" style="margin:34px 0 9px 0;">Bu Kitabı Tavsiye Eder Misiniz?</h5>
          
          <form method="POST" onsubmit="sor()">
            <div class="row">
              <div class="col">
                <button type="submit" name="like" value="like" id="like" class="btn btn-success btn-block">Evet</button>
              </div>
              <div class="col">
                <button type="submit" name="unlike" value="unlike" id="unlike" class="btn btn-danger btn-block">Hayır</button>
              </div>
            </div>
          </form>
        </div>

        <h5 class="bold2 text-left" style="margin:34px 0 9px 0;">Sosyal Medyada Paylaş</h5>
        <div class="row ml-1">
          <button type="button" class="col-sm-2 btn Sbuton fb hover"><i class="fa fa-facebook"></i></button>
          <button type="button" class="col-sm-2 btn Sbuton tw hover"><i class="fa fa-twitter"></i></button>
          <button type="button" class="col-sm-2 btn Sbuton ins hover"><i class="fa fa-instagram"></i></button>
          <button type="button" class="col-sm-2 btn Sbuton gplus hover"><i class="fa fa-google-plus"></i></button>
        </div>

      </div>
    </div>
    <div class="col-md-12">
      <span class="list-group-item list-group-item-action text-justify" style="margin-top: 20px; padding: 30px; te">
        <h5 class="bold2">Kitap Hakkında</h5>
        <?php vtCekYaz("kitaplar",$gelenid,'kitapHakkinda'); ?>
      </span>
    </div>
  </div>
</section>

<section style="background-color: whitesmoke; padding: 50px;">
  <div class="container">
    <h3 class="bold">Okuyucular Bu Kitap Hakkında Ne Dedi</h3>
    <div class="card" style="padding: 15px;">
      <div class="row">
        <div class="col-md-12">
          <div id="disqus_thread"></div>
          <script>
              (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://streetbooks.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
              })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="background-color: #add8e6; padding: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h2 class="bold">Bize Bildirin !</h2>
          <h6>Street Books'ta eksik kitap olduğunu mu düşüyorsunuz? Hemen bize bildirin.</h6>
        </div>
        <div class="col-md-3">
          <a href="sendBook.php"><button type="button" class="btn btn-outline-dark btnBildir">Eksik Kitap Bildir</button></a>
        </div>
      </div>
    </div>
  </section>

  <section>
    <?php include("inc/neOkusam.php"); include("inc/footer.php") ?>
  </section>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.12';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <script>
    function sor() {
      confirm("Tavsiyenizi Göndermek İstiyor Musunuz?");
    }
  </script>

  

</body>
</html>