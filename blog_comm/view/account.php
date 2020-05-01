<?php ob_start(); ?> 

    <div class="compte">
        <h1>Compte</h1>

            <form method="post" action="../../blog_comm/index.php?redirect=account">
                    <input type="text" placeholder="changer le pseudo" required name="update_pseudoadmin">
                    <input class="valider_blog" type="submit" placeholder="valider" name="valider_update_pseudoadmin">
            </form>

            <form method="post" action="../../blog_comm/index.php?redirect=account">
                    <input type="password" placeholder="changer mot de passe" required name="update_password">
                    <input class="valider_blog" type="submit" placeholder="valider" name="valider_update_password">
            </form>
        </div>

    </div>	
<?php $content = ob_get_clean(); ?>