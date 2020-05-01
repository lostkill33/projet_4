
<?php
session_start();
require "../model/CommentManager.php";
require "../model/userManager.php";
require "../model/UserAdmin.php";
$commentManager = new CommentManager();

if (!empty($_POST["valider_update_pseudoadmin"]))
{
    $userManager = new userManager();
    $pseudo = $_POST["update_pseudoadmin"];
    $id = $_SESSION["user"]["id"];
    $userManager -> update($pseudo,$id);
    $_SESSION["user"]["pseudo"] = $pseudo;
}

if (!empty($_POST["valider_update_password"]))
{
    $UserAdmin = new UserAdmin();
    $thispassword = $_POST["update_password"];
    $id = $_SESSION["user"]["id"];
    $UserAdmin -> update_password($thispassword,$id);
}

?>

<!DOCTYPE html>
    <html lang="fr">

        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="style.css" />
            <meta name="viewport" content="width=device-width, user-scalable=0"/>
            <title> admin </title>
            <meta name="description" content="Le blog">
                        <script src="https://cdn.tiny.cloud/1/x8ug5oy3wkl0xpl4saj7cmfldvuup4xgfm2c1dn6j6bgcr1h/tinymce/5/tinymce.min.js"></script>
                <script> tinymce.init({ selector: '#mytextarea'});</script>
        </head>

        <body>
            <header>
                <div class="sous_header">
                    <h1 class="titre_logo"><a href="../index.php?redirect=home">Jean Forteroche blog !</a></h1>
                    <nav class="nav_bar_admin">
                    <a href="admin_comm.php">Commentaires signaler</a>
                    <a href="admin_modif.php">Modifier un billet</a>
                    </nav>
                    <a class="voir_site" href="../index.php">Voir le site !</a>
                     <?php 
                           if (!empty($_SESSION["user"]["pseudo"]))
                            {
                               echo '<p class="session_pseudo">' . $_SESSION["user"]["pseudo"] . " </p>";
                            }
                    ?>
                </div>
            </header>
            <div class="admin">
                <h1>admin</h1>

                <form method="post" action="../index.php?redirect=blog">
                        <input type="text" placeholder="titre" required name="titre_blog">
                    <textarea id="mytextarea" name="text_blog"></textarea>
                        <input class="valider_blog" type="submit" placeholder="valider" name="valider_blog">
                </form>
                


                <div class="change">

                    <form class="change_username_mdp change_mdp" method="post" action="admin.php">
                            <input type="text" placeholder="changer le pseudo administrateur" required name="update_pseudoadmin">
                            <input class="valider_blog" type="submit" placeholder="valider" name="valider_update_pseudoadmin">
                    </form>
                    
                    <form class="change_username_mdp change_username" method="post" action="admin.php">
                            <input type="password" placeholder="changer mot de passe" required name="update_password">
                            <input class="valider_blog" type="submit" placeholder="valider" name="valider_update_password">
                    </form>
                </div>
            </div>
        </body>
    </html>