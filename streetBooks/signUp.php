<!doctype html>
<html lang="tr">
<head>
  <?php
    ob_start();
    session_start();
    include("inc/head.php");
    include("inc/baglan.php");
    include("inc/mylibrary.php");
  ?>
  <title>Üye Ol | Street Books</title>
</head>
<body>
  <section id="coverkayitol">
    <?php include("inc/menu.php"); ?>
    <div class="container text-left" style="padding: 50px;">
      <div class="row"> 
        <div class="col-md-12">

          <div class="card" style="opacity: 0.94">
            <h3 class="bold" style="margin:22px 0px 0px 22px">Üye Ol</h3>
            <label></label>
            <div class="card-body text-secondary">

              <?php
              if ($_POST) {
                $email=trim($_POST["email"]);
                $adi=trim($_POST["first_name"]);
                $soyadi=trim($_POST["last_name"]);

                $sifre=trim($_POST["password"]);
                $sifre2=trim($_POST["password2"]);

                $md5Sifre=md5($sifre);

                $cinsiyet=$_POST['cinsiyet'];
                $sehir=$_POST['sehir'];

                if ($sifre != $sifre2) {
                  echo "<h1 class='red text-center'>Şifreler Uyuşmuyor</h1>";
                  git(2,"kayit-ol.php");
                }

                else{
                  #VT alanlari
                  $tablo="uyeler";
                  $vtemail="email"; $vtad="ad"; $vtsoyad="soyad"; $vtsifre="sifre"; $vtcinsiyet="cinsiyet"; $vtsehir="sehir"; $vtkayitTarihi="kayitTarihi"; $vtDate="NOW()";

                  $ekle=vtekle($tablo, $vtemail, $vtad, $vtsoyad, $vtsifre, $vtcinsiyet, $vtsehir, $vtkayitTarihi, $email, $adi, $soyadi, $md5Sifre, $cinsiyet, $sehir, $vtDate);


                  #$ekle=mysql_query("INSERT INTO uyeler (email,ad,soyad,sifre,kayitTarihi) VALUES ('$email','$adi','$soyadi','$md5Sifre',NOW())") or die (mysql_Error());

                  if ($ekle) {

                    echo "<h2 class='red text-center'>Hata!</h2>";
                    echo mysql_errno();

                    #echo "<div class='alert alert-success text-center'><h1>Başarılı<br></h1> <small class='text-center'>Yönlendiriliyorsunuz...</small></div>";
                    
                    #header("Refresh:2; url=giris-yap.php");
                    git(2,"kayit-ol.php");
                  }
                  else{
                     echo "<div class='alert alert-success text-center'><h1>Başarılı<br></h1> <small class='text-center'>Yönlendiriliyorsunuz...</small></div>";
                     git(2,"signIn.php");
                    }
                } 
              } 
              else{
                ?>

                <form action="" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      ~ <small class="text-right">zaten üyeyim <a href="signIn.php">Giriş Yap</a></small>
                      <small class="form-text text-muted" style="color:crimson !important;">* = Doldurulması zorunlu alanlar.</small>
                      <input type="email" name="email" class="form-control" placeholder="Email*" required="">
                    </div>
                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <input type="text" name="first_name" class="form-control" placeholder="İsim*" required="">
                    </div>


                    <div class="form-group col-md-6">
                      <input type="text" name="last_name" class="form-control" placeholder="Soyisim*" required="">
                    </div>
                  </div>



                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input type="password" name="password" class="form-control" placeholder="Şifre*" required="">
                    </div>

                    <div class="form-group col-md-4">
                      <input type="password" name="password2" class="form-control" placeholder="Şifre Tekrar*" required="">
                    </div>

                    <div class="form-group col-md-1">
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#sifreOlustur">Şifte Oluşturucu</button>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="input-group col-md-6">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="cinsiyet">Cinsiyet</label>
                      </div>
                      <select class="custom-select" name="cinsiyet" id="cinsiyet" required="">
                        <option selected="selected">*Seçiniz...</option>
                        <option value="Erkek">Erkek</option>
                        <option value="Kadın">Kadın</option>
                      </select>
                    </div>
                    <div class="input-group col-md-6">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="sehir">Şehir</label>
                      </div>
                      <select class="custom-select" name="sehir" id="sehir" required="">
                        <option selected="selected">*Seçiniz...</option>
                        <option value="Bursa">Bursa</option>
                        <option value="Edirne">Edirne</option>
                        <option value="Çanakkale">Çanakkale</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group mt-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" checked="true" id="uyelikCheck" required="">
                      <label class="form-check-label" name="uyeOnay"><a href="" data-toggle="modal" data-target="#exampleModal">Üyelik Sözleşmesi</a>'ni okudum, onaylıyorum.</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" checked="true" id="kampanyaCheck" required="">
                      <label class="form-check-label" name="kOnay" >Önemli kampanyalardan haberdar olmak istiyorum.</label>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-success col-md-12">Üyeliğimi Tamamla</button><hr>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <button class="btn btn-primary btn-block" type=""><i class="fa fa-facebook"></i> | Facebook ile üye ol</button>
                    </div>
                    <div class="form-group col-md-6">
                      <button class="btn btn-danger btn-block" type=""><i class="fa fa-google"></i> | Gmail ile üye ol</button>
                    </div>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- modal-sifre-olusturucu -->
      <div class="modal fade" id="sifreOlustur" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"><b>Şifre Oluşturucu</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-row">

                <div class="form-group col-md-12">
                  <label>Küçük harf içersin mi? ( abcd3 )</label>
                  <div class="btn-group btn-group-toggle pull-right" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                      <input type="radio" name="options" id="option1" autocomplete="off" checked> Evet</label>
                      <label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> Hayır</label>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Büyük harf içersin mi? ( ABCDE )</label>
                    <div class="btn-group btn-group-toggle pull-right" data-toggle="buttons">
                      <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Evet</label>
                        <label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> Hayır</label>
                      </div>
                    </div>

                    <div class="form-group col-md-12">
                      <label>Sayı içersin mi? ( 12345 )</label>
                      <div class="btn-group btn-group-toggle pull-right" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" name="options" id="option1" autocomplete="off" checked> Evet</label>
                          <label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> Hayır</label>
                        </div>
                      </div>

                      <div class="form-group col-md-12">
                        <label>Sembol içersin mi? ( !#&%@ )</label>
                        <div class="btn-group btn-group-toggle pull-right" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked> Evet</label>
                            <label class="btn btn-secondary"><input type="radio" name="options" id="option2" autocomplete="off"> Hayır</label>
                          </div>
                        </div>

                        <button class="btn btn-info btn-block" type="submit">Şifreyi oluştur</button>

                      </div>

                      <hr>

                      <div class="form-row">
                        <label><b>Yeni Şifreniz</b></label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Yeni Şifreniz" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-outline-dark" type="button">Kopyala</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer pull-left">
                      <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Kapat</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- modal-sozlesme -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Onaylıyorum</button>
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