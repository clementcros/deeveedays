<html>
    <head>
        <title>Menuiserie Collaborative</title>   
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
        <meta http-equiv="refresh" content="60" />

    </head>

    <body>
        <div class="container affichage">
            <?php
            echo "<h1>Il est $heure</h1>";
            $heure = strtotime($heure);
            foreach ($reservations as $reservation):

                $fin = strtotime($reservation['heure_fin']);
                $debut = strtotime($reservation['heure_debut']);
                $duree = $fin - $debut;
                $encours = $fin - $heure;   
                $pourcentage = (1 - $encours / $duree) * 100;
                $encours = gmdate("H:i", $encours);
                $duree = gmdate("H:i", $duree);
//                echo $pourcentage;
                $client = "";
                if ($reservation['fk_particulier'] != NULL) {
                    foreach ($particuliers as $particulier):
                        if ($particulier['id'] == $reservation['fk_particulier'])
                            $client = $particulier;

                    endforeach;
                }elseif ($reservation['fk_professionnel'] != NULL) {
                    foreach ($professionnels as $professionnel):
                        if ($professionnel['id'] == $reservation['fk_particulier'])
                            $client = $professionnel;
                    endforeach;
                }

                if ($encours < 0.25)
                    $couleur = "danger";
                elseif ($encours < 0.5)
                    $couleur = "warning";
                else
                    $couleur = "success";
                ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-<?php echo $couleur ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $pourcentage; ?>%">
                        <?php echo $client['nom'] . " " . $client['prenom']; ?>
                    </div>
                    <?php echo '&nbsp' . $encours; ?>
                </div>
                <span class='debut'><?php echo substr($reservation['heure_debut'], 0, 5) ?></span>
                <span class='fin'><?php echo substr($reservation['heure_fin'], 0, 5) ?></span>
                <br><br>
                <?php
            endforeach;
            ?>