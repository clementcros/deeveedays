<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DEEVEEDAYS</title>
	<meta name="description" content="Cardio is a free one page template made exclusively for Codrops by Luka Cvetinovic" />
	<meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
	<meta name="author" content="Luka Cvetinovic for Codrops" />
	<!-- Favicons (created with http://realfavicongenerator.net/)-->
	<link rel="apple-touch-icon" sizes="57x57" href="img/favicons/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="img/favicons/apple-touch-icon-60x60.png">
	<link rel="icon" type="image/png" href="img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="img/favicons/manifest.json">
	<link rel="shortcut icon" href="img/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#00a8ff">
	<meta name="msapplication-config" content="img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Normalize -->
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Owl -->
	<link rel="stylesheet" type="text/css" href="css/owl.css">
	<!-- Animate.css -->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.1.0/css/font-awesome.min.css">
	<!-- Elegant Icons -->
	<link rel="stylesheet" type="text/css" href="fonts/eleganticons/et-icons.css">
	<!-- Main style -->
	<link rel="stylesheet" type="text/css" href="css/cardio.css">
</head>

<body>
	<div class="preloader">
		<img src="img/loader.gif" alt="Preloader image">
	</div>
	<nav class="navbar">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="imd/logo.png" data-active-url="img/logo-active.png" alt=""></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right main-nav">
					<li><a href="#intro">Accueil</a></li>
					<li><a href="#services">Top du moment</a></li>
					<li><a href="#team">Auteur coup de coeur</a></li>
					<li><a href="#louer">louez-moi !</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Inscription</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h3 class="light white">Fournisseur de films.</h3>
							<h1 class="white typed">Bienvenue sur DEEVEEDAYS !!!!</h1>
							<span class="typed-cursor">|</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<br>
	
	<section id="services" class="center">
		<div class="container">
			<center><h2 class="center">Les tops du moments</h2></center>
				<center><h4 class="center">Retrouver la selection du top de l'équipe de deeveeday </h4></center>
			<div class="row text-center title">
				
			</div>
			<div class="row services">
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/heart-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Coup de coeur</h4>
						<?php foreach($articles as $article): ?>
						<p class="description"><?php echo $article['titre'];?></p>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/guru-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">top auteurs</h4>
							<?php foreach($articles as $article): ?>
						<p class="description"><?php echo $article['auteur'];?></p>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-md-4">
					<div class="service">
						<div class="icon-holder">
							<img src="img/icons/weight-blue.png" alt="" class="icon">
						</div>
						<h4 class="heading">Top année de sortie</h4>
							<?php foreach($articles as $article): ?>
						<p class="description"><?php echo $article['année_sortie'];?></p>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
		<div class="cut cut-bottom"></div>
	</section>

	<section id="team" class="section gray-bg">
		<div class="container">
			<div class="row title text-center">
				<h2 class="margin-top">biographie auteurs</h2>
				<h4 class="light muted">les tops</h4>
			</div>
			<div class="row">
				<?php foreach($author as $authors): ?>
				<div class="col-md-4">
					<div class="team text-center">
						<div class="cover" style="background:url('<?php echo $authors['dash'];?>'); background-size:cover;">
							<div class="overlay text-center">
								<h3 class="white">bio</h3>
								<h5 class="light light-white">
							<?php echo $authors['biographie'];?>
							</h5>
							</div>
						</div>
						<img src="<?php echo $authors['image'];?>" alt="Team Image" class="avatar">
						<div class="title">
							
							<h4><?php echo $authors['nom'];?></h4>
							
							<h5 class="muted regular">

							<?php echo $authors['age'];?>
							
						</div>
						
					</div>
				</div>
				<?php endforeach ?></h5>
				
		<center  id="louer"><h1>LOUEZ-MOI !!</h1></center>
	</section>
	<section class="section">
    <div class="container margin">
     <div class="row">
    <?php foreach($articles as $article): ?>
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   <article>
        <p><?php echo $article['auteur']; ?></p>
    <h1><?php echo $article['titre'] ?></h1>
    <p><?php echo $article['année_sortie']; ?></p>
    <img id='lienarticle'src=<?php echo $article['image']; ?>> </a>
	<a href="<?php echo site_url('dvdinfo/'.$article['id']) ?>" data-toggle="modal"  class="btn btn-blue">Plus d'infos</a>
         </div>
    <?php endforeach ?>
	</section>
	<a href="<?php echo site_url('dvd') ?>" data-toggle="modal"  class="btn btn-blue">tous les dvd</a>
	<section class="section section-padded blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="owl-twitter owl-carousel">
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">Suivez-nous sur Twitter ! et resté au courant des dernère sortie cinema du moment.</h4>
							<h4 class="light-white light">#action #location #interview</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">deeveedays</h4>
							<h4 class="light-white light">#film #moovie</h4>
						</div>
						<div class="item text-center">
							<i class="icon fa fa-twitter"></i>
							<h4 class="white light">L'actu du top parodie de films.</h4>
							<h4 class="light-white light">#nanare #arnaque #argent</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" class="close-link"><i class="icon_close_alt2"></i></a>
				<h3 class="white">Inscription</h3>
				<form action="" class="popup-form">
					<input type="text" class="form-control form-white" placeholder="Nom et prenom">
					<input type="text" class="form-control form-white" placeholder="Email ">
					<div class="dropdown">
						<button id="dLabel" class="form-control form-white dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							choisir l'abonnement
						</button>
						<ul class="dropdown-menu animated fadeIn" role="menu" aria-labelledby="dLabel">
							<li class="animated lightSpeedIn"><a href="#">1 mois illimité (150 €)</a></li>
							<li class="animated lightSpeedIn"><a href="#">3 mois illimité (425 €)</a></li>
							<li class="animated lightSpeedIn"><a href="#">1 an illimité (900 €)</a></li>
							<li class="animated lightSpeedIn"><a href="#">compte gratuit </a></li>
						</ul>
					</div>
					<div class="checkbox-holder text-left">
						<div class="checkbox">
							<input type="checkbox" value="None" id="squaredOne" name="check" />
							<label for="squaredOne"><span>J'accepte les <strong>Termes &amp; Conditions</strong></span></label>
						</div>
					</div>
					<button type="submit" class="btn btn-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">louez vite votre premier film !!!</h3>
					<h5 class="light regular light-white">Adieux netflix !!!</h5>
					<a href="#" class="btn btn-blue ripple trial-button">INSCRIPTION</a>
				</div>
				<div class="col-sm-6 text-center-mobile">
					<h3 class="white">horraire ouverture boutique <span class="open-blink"></span></h3>
					<div class="row opening-hours">
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">lundi - vendredi</h5>
							<h3 class="regular white">  <?php foreach($horraires as $horraire): ?><?php echo $horraire['ouverture_semaine']; ?> - <?php echo $horraire['fermeture_semaine']; ?> <?php endforeach ?></h3>
						</div>
						<div class="col-sm-6 text-center-mobile">
							<h5 class="light-white light">Samedi- dimande</h5>
							<h3 class="regular white"><?php foreach($horraires as $horraire): ?><?php echo $horraire['ouverture_weekend']; ?> - <?php echo $horraire['fermeture_weekend']; ?> <?php endforeach ?></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; 2015 All Rights Reserved. Powered by <a href="http://www.phir.co/">le fisteur</a> exclusively for <a href="http://tympanus.net/codrops/">bdsm COMPAGNY</a></p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="https://www.facebook.com/clement34420?ref=bookmarks"><i class="fa fa-facebook"></i></a></li>
						<li><a href="www.google.fr"><i class="fa fa-twitter"></i></a></li>
						<li><a href="www.google.fr"><i class="fa fa-google-plus"></i></a></li>
						 <a class="nav-item nav-link active" href="<?php echo site_url('admin') ?>">admin <span class="sr-only"></span></a>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/typewriter.js"></script>
	<script src="js/jquery.onepagenav.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
