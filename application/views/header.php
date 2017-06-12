<!DOCTYPE html>
<html>
    <head>
        <title>Menuiserie Collaborative</title>   
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
        <link rel="icon" href="<?php echo base_url(); ?>/img/8636Flavicon5.png" sizes="32x32" />
        <link rel="icon" href="<?php echo base_url(); ?>/img/8636Flavicon5.png" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>/img/8636Flavicon5.png" />
        <link rel="stylesheet" media="screen and max-width: 480px" href="<?php echo base_url(); ?>css/mobile.css" />
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>   
    </head>
<script>
@media all and max-width: 480px
{
    nav
    {
        width: auto;
        text-align: left;
    }
    
    nav ul
    {
        flex-direction: column;
    }

    nav li
    {
        padding-left: 4px;
    }
    
    nav a
    {
        font-size: 1.1em;
    }
    
    nav a:hover
    {
        border-bottom: 0;
    }
}
    </script>
    <body>
        <div class="navbar navbar-default row">
            <ul class="nav navbar-nav">
                <li><a href='<?php echo site_url() ?>'><img src="<?php echo base_url(); ?>/img/logo.png" height="40" alt="La menuiserie"></a></li>
            </ul>
            <div class="topnav" id="myTopnav">
                <?php if (!isset($_SESSION['user'])) { ?>
                    <a href='<?php echo site_url('user') ?>'>Connexion</a>
                <?php } else { ?>
                    <a href='<?php echo site_url('user/account') ?>'>Mon Compte</a>
                <?php } ?>
                <a href='<?php echo site_url('contact') ?>'>Nous Contacter</a>
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href='<?php echo site_url('reserver') ?>'>Reserver</a>
                <?php } ?>
                <a href='<?php echo site_url('mot') ?>'>En quelques mots...</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>

        </div>

        <div class="container">
