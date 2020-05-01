
<?php
session_start();

    require_once("../model/blogManager.php");
    $blogManager = new blogManager();


if(isset($_POST["titre_blog"]))
{
        $titre_blog = htmlspecialchars($_POST["titre_blog"]);
    $texte_blog = htmlspecialchars($_POST["text_blog"]);
    $blogManager -> createblog($titre_blog,$texte_blog);
}

if (!empty($_POST["detele_this_blog"]))
{
    $id_blog = $_GET["post_id"];
    $blogManager -> deleteblog($id_blog);
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
                        <a href="admin.php">nouveau billet</a>
                        <a href="admin_comm.php">Commentaires signaler</a>
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
            <div class="modif_admin">
                            <?php
        
            $readblog = $blogManager -> readBlog("titre","contenu","id");
            while ($donnees_blog = $readblog -> fetch(PDO::FETCH_ASSOC))
            {
                $contenu = $donnees_blog["contenu"];
                $titre = $donnees_blog["titre"];
                echo '<div class="all_billet">';
                echo htmlspecialchars_decode('<h2>' . $donnees_blog["titre"] . ' </h2> <p class="date_post">' . $donnees_blog["date"] . '</p> <p class="text_billet">' . $donnees_blog["contenu"] . '</p>');
           
                echo '<a class="plus" href="admin_modif_this_article?post_id=' . $donnees_blog["id"] . '&title=' . $donnees_blog["titre"] . '">Voir plus > </a></div>';

            }
            ?>
            </div>
        </body>
    </html>