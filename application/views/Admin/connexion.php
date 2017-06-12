<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
<div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 connect">
    <?php
    echo "<h1>$titre</h1>";

        echo form_open('admin/connexion');
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p><?php echo $user['label'] ?></p></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><?php echo form_input($user) ?></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span class="error"> <?php echo form_error('email'); ?></span>
            </div> 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">    
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><p><?php echo $password['label'] ?></p></div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><?php echo form_input($password) ?></div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <span class="error"> <?php echo form_error('password'); ?></span>
            </div> 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
            <?php echo form_submit('envoi', 'Connexion', 'class="bouton"'); ?>
            
       

    </div>
    <?php echo form_close(); ?>
</div>    
        
    