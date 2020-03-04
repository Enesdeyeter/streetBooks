

<!doctype html>
<html lang="tr">
<head>

  <?php include("inc/mylibrary.php"); dahilEt("inc/head.php");

  dahilEt("inc/baglan.php");
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
          <span class="wSmoke breadcrumb-item">SSS</span>
        </nav>
      </div>

      <div class="row" >
        <div class="col-md-12">
          <h1 class="bold wSmoke text-left font">Sık Sorulan Sorular</h1> 
        </div>
      </div>
    </section>

    <section style="background-color: whitesmoke; padding: 50px;">
      <div class="container">
        <div class="card" style="padding: 15px;">


          <div class="row">
            <div class="col-12 col-md">
              <?php
              $i=0;
              $conn = mysqli_connect("localhost","root","", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
              $baslik= mysqli_query($conn,'Select * from sss') or die(mysqli_connect_error());
              while($deger=mysqli_fetch_array($baslik))
              {
                $i+=1;
                echo '<div id="accordion">';
                echo '<div class="card cardsss">';
                echo '<div class="card-header" id="heading'.$i.'">';
                echo '<h5 class="mb-0">';
                echo '<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="false" aria-controls="collapse'.$i.'">';
                echo '<td>'.$deger['baslik'].'</td>';
                echo '</button>';
                echo '</h5>';
                echo '</div>';

                echo '<div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#accordion">';
                echo '<div class="card-body">';
                echo '<td>'.$deger['icerik'].'</td>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    

    <section>
      <?php include("inc/neOkusam.php"); include("inc/footer.php"); ?>
    </section>
  </body>
  </html>