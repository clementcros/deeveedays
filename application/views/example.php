
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
       
    <?php endforeach; ?>
    <?php foreach($js_files as $file): ?>

        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>

<!--    <style type='text/css'>
        body
        {
            font-family: Arial;
            font-size: 14px;
        }
        a {
            color: blue;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover
        {
            text-decoration: underline;
        }
    </style>-->
</head>
<body>
<div class="container">
    <div class="row">

<div class="col-xs-3 col-sm-8 col-md-6 col-lg-4">Contenu</div>
    
<nav role="navigation" class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
    </div>
    <!-- Collection of nav links and other content for toggling -->
    
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('admin')?>">Accueil admin</a></li>
           
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><img src="../../logo.png" height="50" width="90" alt="La menuiserie"></li>
        </ul>
    </div>
</nav>
<style>
    img{
        background-color: lightgrey;
    }

body{
    background-image: url('https://previews.123rf.com/images/fotographic1980/fotographic19801204/fotographic1980120400376/13177359-cd-dvd-on-blue-digital-background-Stock-Vector-music-techno.jpg');
}
.edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary {
    text-align: center;
}
.actions{
    text-align: center;
}
.footer {
    margin: 1.8em;
}

</style>

<!-- End of header-->
<div style='height:20px;'></div>
<div>
    <?php echo $output; ?>

</div>
<!-- Beginning footer -->
<div class='footer'><p>DEEVEEDAYS !!!!!</p></div>
<!-- End of Footer -->
</div>
</div>
</div>
</body>
</html>
 