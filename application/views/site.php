
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

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
<nav role="navigation" class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand">Administration</a>
    </div>
    <!-- Collection of nav links and other content for toggling -->
    
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('admin')?>">Home</a></li>
            <li><a href="<?php echo site_url('site/articles')?>">Articles</a></li>          
            <li><a href='<?php echo site_url('site/partenaires')?>'>Partenaires</a></li>
            <li><a href="<?php echo site_url('site/accueil')?>">Accueil du site</a></li>
            
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
    background-image: url('http://www.clipartkid.com/images/836/40-stunning-wood-backgrounds-Hmokda-clipart.jpg');
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
<div class='footer'><p>La menuiserie</p></div>
<!-- End of Footer -->
</body>
</html>
 