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

        
	<section class="section">
    <div class="container margin">
     <div class="row">
    <?php foreach($articles as $article): ?>
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   <article>
        <p><?php echo $article['title']; ?></p>
    <h1><?php echo $article['slug'] ?></h1>
    <p><?php echo $article['text']; ?></p>
    
	<a href="<?php echo site_url('dvdinfo/'.$article['id']) ?>" data-toggle="modal"  class="btn btn-blue">Plus d'infos</a>
         </div>
    <?php endforeach ?>
	</section>
</body>
</html>

