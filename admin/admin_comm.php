<?php
include "../model/CommentManager.php";
$commentManager = new CommentManager();

if (!empty($_POST["delete_comm"]))
{
    $id_comm = $_GET["id_comm"];
    $commentManager -> delete_comm($id_comm);
}

if (!empty($_POST["no_signal"]))
{
    $id_comm = $_GET["id_comm"];
   $commentManager -> unreport($id_comm);
}

session_start();
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
                    <a href="admin.php">nouveau billet</a>
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
            
            <div class="admin_comm">
                <?php
                $readcomment = $commentManager -> read_report();
                while ($donnees_comment = $readcomment -> fetch(PDO::FETCH_ASSOC))
                {
                ?>  <div> <?php
                    $id_comm = $donnees_comment["id"];
                    $titre_billet = $donnees_comment["titre"];
                    $content = $donnees_comment["content"];
                    $pseudo = $donnees_comment["pseudo"];
                    echo '<div class="all_comment">
                    <h2>' . $titre_billet . '</h2>
                   <p class="text_comment"><strong>commentaire:</strong> ' . $content . '</p>
                   <p> <strong>pseudo:</strong> ' . $pseudo . '</div>';  
                ?>
                <?php echo '<form method="post" action="admin_comm.php?id_comm=' . $id_comm .'">' ?>
                <input type="submit" value="Annuler" name="no_signal">
                <?php echo '<form method="post" action="admin_comm.php?id_comm=' . $id_comm .'">' ?>
                <input type="submit" value="Supprimer" name="delete_comm">
                </form>
                      
                </div>
                <?php
                }
            ?>
            </div>
