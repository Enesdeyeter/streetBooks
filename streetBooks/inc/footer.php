<section style="background-color: whitesmoke;">
	<footer class="container py-5">
		<div class="row">
			<div class="col-12 col-md">
				<span class="navbar-brand"><a class="navbar-brand mb-2" href="index.php"><img class="img-fluid col-xs-4" src="assets/img/logov4.png"></a></span>
			</div>
			<div class="col-6 col-md">
				<h5>Listeler</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Ne Okusam</a></li>
					<li><a class="text-muted" href="#">Çok Satanlar</a></li>
					<li><a class="text-muted" href="#">Bestseller 2017</a></li>
					<li><a class="text-muted" href="#">Yazarların Seçtikleri</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Resources</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Resource</a></li>
					<li><a class="text-muted" href="#">Resource name</a></li>
					<li><a class="text-muted" href="#">Another resource</a></li>
					<li><a class="text-muted" href="#">Final resource</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Hakkımızda</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">SSS</a></li>
					<li><a class="text-muted" href="#">Yardım</a></li>
					<li><a class="text-muted" href="#">İletişim</a></li>
					<li><a class="text-muted" href="#">Hakkımızda</a></li>
				</ul>
			</div>
			<div class="col-6 col-md">
				<h5>Sosyal Medya</h5>
				<ul class="list-unstyled text-small">
					<li><a class="text-muted" href="#">Facebook</a></li>
					<li><a class="text-muted" href="#">Twitter</a></li>
					<li><a class="text-muted" href="#">Instagram</a></li>
					<li><a class="text-muted" href="#">Google+</a></li>
				</ul>
			</div>
		</div>
	</footer>
	
	<!--<div class="bot fixed-botom">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md col-12 col-xs text-left">
					<small> © Copyright 2018 Tüm Hakları Saklıdır.</small>
				</div>
				<a href="#0" class="cd-top js-cd-top"><i class="fa fa-facebook"></i></a>
				<div class="col-6 col-md col-12 col-xs text-right">
					<small><a href="proje-hakkinda.php" style="color:#212121;"><strong>NYP Proje</strong></a></small>
					<small>| Enes Bilaloğulları | </small>
					<small>Gökhan Mertcan</small>
				</div>
			</div>
		</div>
	</div>-->
</section>

<script>
	$(document).ready(function(){
  // Add scrollspy to <body> 

  // Add smooth scrolling on all links inside the navbar
  $("#animation a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    }  // End if
});
});
</script>

