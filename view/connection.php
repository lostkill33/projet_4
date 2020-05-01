<?php ob_start(); ?>

        <div class="connection">
            <h1>Connexion</h1>

            <form method="post" action="./index.php?redirect=connection">
            <input type="text" placeholder="pseudo" name="pseudo_admin" required>
            <input type="password" placeholder="mot de passe" name="password" required>
            <input type="submit" value="connexion" name="valider_connection">    
            </form>
            
            
        <a class="register" href="./index.php?redirect=register">Inscription</a>

            
        </div>
<?php $content = ob_get_clean(); ?>