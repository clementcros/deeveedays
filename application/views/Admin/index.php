
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>


<!-- As a heading -->
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="<?php echo site_url('') ?>">Accueil <span class="sr-only">(current)</span></a>
       <a class="nav-item nav-link active" href="<?php echo site_url('admin/disconnect') ?>">deconnection <span class="sr-only">(current)</span></a>
      
      
    </div>
  </div>

</nav>


 <h1 class="text-center">interface admin</h1>" ;

<style>
.btn-primary{
    color: white;
}
</style>
<br>
<h1 class="text-center"> Gestion du contenue </h1>
<center><p>Accéder a la page de gestion du site web pour mettre a jour les différents films ou auteurs</p></center>
<center><a class="btn btn-primary" href="<?php echo site_url('examples/dvd')?>" role="button">Gestion des films</a></center>
<br>
<center><a class="btn btn-primary" href="<?php echo site_url('examples/auteur')?>" role="button">Gestion des auteur</a></center>
<br>
<br>
<center><a class="btn btn-primary" href="<?php echo site_url('examples/horraire')?>" role="button">Gestion des horraires</a></center>
<br>
<br>
<center><h1> Gestion de l'espace commentaire </h1>
<center><p>Accéder a la page de gestion des commentaires </p></center>
<center><a class="btn btn-primary" href="<?php echo site_url('examples/commentaire')?>" role="button">administration des commentaires</a></center>
<br>
<br>
<style>
    body {
        background-image: url('http://helveticomm.ch/files/2013/08/opera-background-light-blue1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>