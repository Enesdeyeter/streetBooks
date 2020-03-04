<!doctype html>
<html lang="tr">
<head>
  <?php
  ob_start();
  session_start();
  include("inc/head.php");
  include("inc/baglan.php");
  ?>
  <title>Giriş Yap | Street Books</title>
</head>
<body>
  <section id="covergirisyap">
    <?php include("inc/menu.php") ?>
    <div class="container text-center" style="padding: 50px;">
      <div class="row"> 
        <div class="col-md-7">
          <div class="card" style="opacity: 0.94">
            <div class="card-body text-success">
              <h3 class="bold">Giriş Yap</h3>

              <?php
              if ($_POST['girisYap']) {
                $email=trim($_POST["email"]);
                $sifre=$_POST["sifre"];
                $sonSifre=md5($sifre);

                $kontol=mysqli_query($conn,"SELECT * FROM uyeler WHERE email='$email'");

                if (mysqli_num_rows($kontol)>0) {
                  $parcala=mysqli_fetch_array($kontol);
                  $gecerliSifre=$parcala['sifre'];

                  if ($gecerliSifre == $sonSifre){
                    $_SESSION['oturum']=true;
                    $_SESSION['email']=$email;
                    $_SESSION['ad']=$parcala['ad'];
                    $_SESSION['soyad']=$parcala['soyad'];
                    $_SESSION['sifre']=$parcala['sifre'];
                    $_SESSION['cinsiyet']=$parcala['cinsiyet'];
                    $_SESSION['sehir']=$parcala['sehir'];
                    $_SESSION['kayitTarihi']=$parcala['kayitTarihi'];
                    header("Location:profile.php");
                  }
                  else
                    echo "<div class='alert alert-danger'>Lütfen e-mail ve şifrenizi kontrol edin.</div>";
                }
                else
                  echo "<div class='alert alert-danger'>Böyle bir e-mail sisteme kayıtlı değil.</div>";
              }
              ?>

              <form class="form-signin" action="" method="POST">
                <div class="form-label-group mb-2">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-label-group">  
                  <input type="password" class="form-control" name="sifre" placeholder="Şifre" required="">
                </div><br>
                <input type="submit" name="girisYap" class="btn btn-success btn-block mb-3" type="submit" value="Giriş Yap">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <button class="btn btn-primary btn-block" aria-describedby="FacebookGir" type="submit">Facebook ile giriş yap</button>
                  </div>
                  <div class="form-group col-md-6">
                    <button class="btn btn-danger btn-block" type="submit">Gmail ile giriş yap</button>
                  </div>
                </div>

                <label><a href="" title="şu anda şifre sıfırlama işlemi çalışmıyor, hatırlamaya çalış" data-toggle="modal" data-target="#sifremi-unuttum"> Şifremi Unuttum</a></label><br>
                <label><a href="signUp.php"> Üye değil misiniz? Hemen üye olun.</a></label>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <ul class="list-group" style="opacity: 0.94;">
            <li class="list-group-item"><h3 class="bold" style="margin-bottom: -3px;">En Çok Tavsiye Edilen Kitaplar</h3></li>
            
            <?php
            $baslik= mysqli_query($conn,'SELECT * FROM kitaplar ORDER BY begen DESC LIMIT 5') or die(mysqli_connect_error());
            while($deger=mysqli_fetch_array($baslik))
            {

              $id=$deger['id'];

              echo '<li class="list-group-item list-group-item-action"><a href="detailBooks.php?id='.$deger['id'].'">'.$deger['kitapAdi'].'</a></li>';

            }
            ?>
          </ul>
        </div>
      </div>
    </section>

    <!-- sifremi-unuttum -->
    <div class="modal fade" id="sifremi-unuttum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Şifremi Unuttum</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <input type="email" class="form-control" name="email" placeholder="Email" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="button" class="btn btn-primary">Sıfırlama isteği gönder</button>
          </div>
        </div>
      </div>
    </div>

    <section style="padding: 50px;">
      <div class="container text-center">
        <h2 class="bold text-left">Kategoriler</h2>
        <div class="row">

          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>

          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Felsefe</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Bilim-Kurgu</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>
          <div class="col-md-3">
            <div class="alert alert-secondary hover"><a href="#">Edebiyat</a></div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <?php include("inc/footer.php") ?>
    </section>
  </body>
  </html>