<?php include("baglan.php");

$conn = mysqli_connect("localhost","root", "", "streetbooks") or die ('Sunucuya Bağlanamadım.'); 

 #uyeler
if($result = $conn->query("SELECT * FROM uyeler ORDER BY id")){
  $uyeler=$result->num_rows;
}

 #kitaplar
if($result = $conn->query("SELECT * FROM kitaplar ORDER BY id")){
  $kitaplar=$result->num_rows;
}

  #eksikkitaplar
if($result = $conn->query("SELECT * FROM eksikkitap ORDER BY id")){
  $eksikkitap=$result->num_rows;
}
?>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $uyeler; ?><sup style="font-size: 20px">üye</sup></h3>
        <p>Toplam Üye</p>
      </div>
      <div class="icon">
        <i class="fa fa-users" style="margin-top: 20px;"></i>
      </div>
      <a href="uyeler.php" class="small-box-footer">İncele <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">

    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $kitaplar; ?><sup style="font-size: 20px">kitap</sup></h3>

        <p>Toplam Kitap</p>
      </div>
      <div class="icon">
        <i class="fa fa-book" style="margin-top: 20px;"></i>
      </div>
      <a href="kitaplar.php" class="small-box-footer">İncele <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">

    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $eksikkitap; ?><sup style="font-size: 20px">kitap</sup></h3>

        <p>Kitap Talepleri</p>
      </div>
      <div class="icon">
        <i class="fa fa-bolt"></i>
      </div>
      <a href="eksikKitap.php" class="small-box-footer">İncele <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">

    <div class="small-box bg-red">
      <div class="inner">
        <h3>Street Books </h3>

        <p>Admin Panel</p>
      </div>
      <div class="icon">
        <i class="fa fa-list-alt"></i>
      </div>
      <a href="#" class="small-box-footer">İncele <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>