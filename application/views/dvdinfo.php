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
      
      
    </div>
  </div>
  <h1 class="navbar-brand mb-0"><?php echo $article['titre']?></h1>
</nav>

<br>
		<h1 class="text-center">LOUEZ-MOI !!</h1>
	</section>
	<section class="section">
    <div class="container margin">
     <div class="row">
   
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   <article>
        <p></p>
   <CENTER> <h1><?php echo $article['titre']; ?></h1>
   <center> <p><?php echo $article['année_sortie']; ?></p>
    <center><img id='lienarticle'src=<?php echo $article['image']; ?>> </a>
    <br>
    <br>
    <h3 class="text-center">Préambule :</h3>
	<center><p id="preambule"> <?php echo $article['preambule'] ?></p>
         </div>


         
      <center><h4 class="text-center">LOUER MOI POUR :  <?php echo $article['prix'] ?> </h4></center> 
      <br>
        

</section>
<br>
<p class="text-center"><?php echo $commentaires['texte']; ?></p>

<h1>top commentaire :</h1>
<?php
 
    echo form_open('form/valid_form');
 
      $nom= array(
 
        'name'=>'nom',
 
        'id'=>'nom',
 
        'placeholder'=>'Nom',
 
        'value'=>set_value('nom')
 
      );
      echo form_input($nom);
      $prenom= array(
 
        'name'=>'prenom',
 
        'id'=>'prenom',
 
        'placeholder'=>'Prenom',
 
        'value'=>set_value('prenom')
 
      );
      echo form_input($prenom);
      $mail= array(
 
        'name'=>'mail',
 
        'id'=>'mail',
 
        'placeholder'=>'Email',
 
        'value'=>set_value('mail')
 
      );
      echo form_input($mail);
    echo form_submit('envoi', 'Valider');
 
    echo form_close();
 
?>
<br>


<style>
#preambule {
    width: auto;
    margin 25px;
    height: auto;
    border: 1px solid black;
    box-sizing: border-box;
    background-color: silver;
    color: dark;
    border-radius: 8px;

}
    body {
        background-image: url('http://helveticomm.ch/files/2013/08/opera-background-light-blue1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
 
    </style>