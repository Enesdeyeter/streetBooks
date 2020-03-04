<nav class="bgtext navbar navbar-expand-lg navbar-light bg-nav ">
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
						<?php
						$conn = mysqli_connect("localhost","root", "", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
						$baslik= mysqli_query($conn,'Select * from kategoriler') or die(mysqli_connect_error());
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

				<li class="nav-item">
					<a href="signUp.php" class="nav-link">Üye Ol</a>
				</li>

				<li class="nav-item">
					<a href="signIn.php" class="nav-link">Giriş Yap</a>
				</li>
			</ul>
		</div>
	</div>
</nav>