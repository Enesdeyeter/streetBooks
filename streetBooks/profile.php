<!doctype html>
<html lang="tr">
<head>
  <?php include("inc/head.php"); include("inc/mylibrary.php"); ?>
  <title>Profil | Bi' Kitap</title>
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
      <div class="row" >
        <div class=" col-md-12">
          <h1 class="bold wSmoke text-left">Profil Bilgileri</h1> 
        </div>
      </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" href="sifreD" id="sifreD" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Şifre Değiştir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <p style="color:crimson;">Burada şifrenin ne kadar önemli olduğunu felan anlatırız.</p>
            </div>

            <?php
            if ($_POST) {
              $eskiSifre=md5($_POST['eskiSifre']);
              $yeniSifre=$_POST['yeniSifre'];
              $yeniSifreTekrar=$_POST['yeniSifreTekrar'];

              $gecerliSifre = $_SESSION['sifre'];

              if ($eskiSifre==$gecerliSifre) {
                if ($yeniSifre==$yeniSifreTekrar) {
                  $sonSifre=md5($yeniSifre);
                  //mysql_query("UPDATE uyeler SET sifre='$sonSifre' WHERE sifre='$gecerliSifre'");
                  $tablo="uyeler";
                  $alan="sifre";

                  vtguncelle($tablo,$alan,$sonSifre,$alan,$gecerliSifre);

                  echo "<div class='alert alert-success'>Şifre Değişikliği Başrılı.</div>";
                }
                else
                  echo "<div class='alert alert-danger'>Yeni Şifreler eşleşmiyor.</div>";
              }
              else
                echo "<div class='alert alert-danger'>Geçerli şifreniz eşleşmiyor.</div>";
            }
            ?>

            <form method="POST">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Eski Şifre" name="eskiSifre">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Yeni Şifre" name="yeniSifre">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Yeni Şifre Tekrar" name="yeniSifreTekrar">
                </div>
              </div>
              <input type="submit" class="btn btn-success" value="Değişitir">
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>

    <section>
      <div class="container text-left" style="padding: 50px;">

        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-danger"> <i class="fa fa-heart"></i> Favorilerinize eklediğiniz kitapları görüntülemek için <a href="">tıklayınız.</a></div>
          </div> 
        </div>

        <div class="row"> 
          <div class="col-md-12">

            <div class="card" style="opacity: 0.94">
              <div class="card-body text-secondary">
                <form>
                  <div class="text-center mb-2">
                    <div class="form-group col-md-12">
                      <img style="width: 150px;" src="assets\img\noprofile.png" alt="profil-photo" class="rounded-circle border">
                    </div>

                    <div class="text-center">
                      <small><b>Kayıt Tarihi: </b><?php echo $_SESSION['kayitTarihi']; ?></small>  
                    </div>

                    
                    <hr>
                    

                  </div>
                  <?php $kontol=mysqli_query($conn,"SELECT * FROM uyeler WHERE email='$email'"); ?>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                     <?php echo "<input type='email' class='form-control' disabled='' placeholder='"; echo $_SESSION['email']; echo "'>";  ?>
                   </div>
                 </div>

                 <div class="form-row">
                  <div class="form-group col-md-6">
                    <?php echo "<input type='text' class='form-control' disabled='' placeholder='"; echo $_SESSION['ad']; echo "'>";  ?>
                  </div>
                  <div class="form-group col-md-6">
                    <?php echo "<input type='text' class='form-control' disabled='' placeholder='"; echo $_SESSION['soyad']; echo "'>";  ?>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="password" class="form-control" placeholder="********" disabled="">
                  </div>
                  <div class="form-group col-md-6">
                    <button type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#sifreD">Şifreyi değiştirmek için tıklayınız</button>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <?php echo "<input type='text' class='form-control' disabled='' placeholder='"; echo $_SESSION['cinsiyet']; echo "'>";  ?>
                  </div>
                  <div class="form-group col-md-6">
                    <?php echo "<input type='text' class='form-control' disabled='' placeholder='"; echo $_SESSION['sehir']; echo "'>";  ?>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <!-- <div class="card" style="padding: 20px;">
            <form action="" method="_POST">
              <div class="form-row">
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Eski Şifre" name="eskiSifre" required="">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Yeni Şifre" name="yeniSifre" required="">
                </div>
                <div class="form-group col-md-12">
                  <input type="password" class="form-control" placeholder="Yeni Şifre Tekrar" name="yeniSifreTekrar" required="">
                </div>
              </div>
              <input type="submit" class="btn btn-success" value="Değişitir">
            </form>
          </div> -->

        </div>
      </div>
    </div>
  </section>

  <section id="sss">
    <?php include("inc/footer.php") ?>
  </section>
</body>
</html>