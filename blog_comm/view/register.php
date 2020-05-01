<?php ob_start(); ?>

        <div class="inscription">
            <h1>inscription</h1>

            <form method="post" action="./index.php?redirect=home">
            <input type="text" placeholder="pseudo" name="pseudo_insciption" required>
            <input type="password" placeholder="mot de passe" name="password_insciption" required>
            <input type="submit" value="inscription" name="valider_insciption">    
            </form>
        </div>


<?php $content = ob_get_clean(); ?>