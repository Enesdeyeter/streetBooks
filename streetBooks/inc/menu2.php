<?php include("inc/baglan.php");?>
<?php ob_start(); session_start(); ?>
<nav class="bgtext navbar navbar-expand-lg navbar-light bg-nav">
	<div class="container">
		<a class="navbar-brand" href="index.php"><img class="img-logo" src="assets/img/logov4.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Anasayfa</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Kitaplar
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<!-- <a class="dropdown-item" href="kitapRoman.php">Roman <span class="badge badge-danger">Yeni</span></a>
						<a class="dropdown-item" href="#">Hikaye <span class="badge badge-info">Yakında</span></a>
						<a class="dropdown-item" href="#">Edebiyat <span class="badge badge-info">Yakında</span></a>
						<a class="dropdown-item" href="#">Bilim-Kurgu <span class="badge badge-info">Yakında</span></a>
						<a class="dropdown-item" href="kitapDiger.php">Diğer <span class="badge badge-danger">Yeni</span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="kitap-oner.php">Kitap Önerin <span class="badge badge-danger">Yeni</span></a> -->
						<?php
						$con = mysqli_connect("localhost","root","", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
						$baslik= mysqli_query($con,'Select * from kategoriler') or die(mysqli_connect_error());
						while($deger=mysqli_fetch_array($baslik))
						{
							echo '<a class="dropdown-item" href="categories.php?id='.$deger['id'].'">'.$deger['kategoriAdi'].'</a>';
						}
						?>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="sendBook.php">Kitap Önerin <span class="badge badge-danger">Yeni</span></a>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Araçlar
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Gruplar <span class="badge badge-info">Yakında</span></a>
						<a class="dropdown-item" href="#">Notlar <span class="badge badge-info">Yakında</span></a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="">Yazara Sor <span class="badge badge-info">Yakında</span></a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="faq.php">SSS</a>
				</li>
			</ul>
			

			<ul class="navbar-nav nav-flex-icons">
				<li class="nav-item">
					<div class="col-md-12">
						<form class="navbar-form" role="search" action="searchResult.php" method="POST">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Kitap Ara" name="aranan">
								<div class="input-group-append">
									<button class="btn btn-outline-dark" type="submit"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span>Profil</span>
						<span class="glyphicon glyphicon-chevron-down"></span>
					</a>
					<ul class="dropdown-menu">
						<div class="navbar-login">
							<div class="row">
								<div class="col-md-12 text-center">
									<div class="col-md-12"><p class="mb-1"><b><?php echo $_SESSION['ad']; echo " "; echo $_SESSION['soyad'] ?></b></p></div>
									<div class="col-md-12"><p class="small"><?php echo $_SESSION['email']; ?></p></div>
									<div class="dropdown-divider"></div>
									<div class="col-md-12"><a href="profile.php"><button type="button" class="btn btn-outline-dark mb-1 btn-sm btn-block">Profile Git</button></a></div>
									<div class="col-md-12"><a href="logout.php"><button type="button" class="btn btn-outline-danger mb-1 btn-sm btn-block">Çıkış Yap</button></a></div>
								</div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>