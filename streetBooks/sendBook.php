<!doctype html>
<html lang="tr">
<head>
	<?php include("inc/head.php") ?>
	<title>Kitap Önerin | Street Books</title>
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
					<a class="wSmoke breadcrumb-item" href="#">Kitaplar</a>
					<span class="wSmoke breadcrumb-item">Kitap Önerin</span>
				</nav>
			</div>

			<div class="row" >
				<div class="col-md-12">
					<h1 class="bold wSmoke text-left font">Kitap Önerin</h1> 
				</div>
			</div>
		</section>


		<section style="background-color: whitesmoke; padding: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-warning" role="alert">
							Eğer sitemizde görüşlerinizi belirtmek istediğiniz kitap(lar) yoksa bizlere aşağıdaki formu doldurarak bildiriniz. En kısa sürede sitemize ekleyeceğimize hiç şüpheniz olmasın.
						</div>
						<div class="card" style="padding: 30px;">

							<?php
							if ($_POST) {
								$kitapAd = trim($_POST["adi"]);
								$kitapYazari = trim($_POST["yazari"]);

								$ekle=mysqli_query($conn, "INSERT INTO eksikkitap (kitapAdi,kitapYazar) VALUES ('$kitapAd','$kitapYazari')") or die (mysqli_connect_Error());

								if ($ekle) {
									echo "<div class='alert alert-success text-center'><h1>eksik kitap bilgisi başarıyla gönderildi<br></h1> <small class='text-center'>yönlendiriliyorsunuz...</small></div>";
									header("Refresh:3; url=sendBook.php");
								}
								else
									echo "<h2 class='red text-center'>Hata!</h2>";
							}

							else{
							?>

							<form method="POST" action="">
								<div class="form-group">
									<label>Kitap Adı</label>
									<input type="text" name="adi" class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Kitap Yazarı</label>
									<input type="text" name="yazari" class="form-control" required="">
								</div>
								<button type="submit" class="btn btn-success">Gönder</button>
							</form>
							<?php } ?>
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