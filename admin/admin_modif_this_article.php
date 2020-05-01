  <?php
include "../model/CommentManager.php";
$commentManager = new CommentManager();
$post_id = $_GET["post_id"];

include "../model/blogManager.php";
$blogManager = new blogManager();
$blogreadid = $blogManager -> readblogid($post_id);

/***************************************/

if (!empty($_GET["title"]))
{
    $title_blog = $_GET["title"];
}

if (!empty($_POST["modif_billet"]))
{
    $id_blog = $post_id;
    $title_blog = $_POST["title_blog"];
    $content_blog = $_POST["content_blog"];
    $_GET["title"] = $title_blog; 
    $blogManager -> updateblog($title_blog,$content_blog,$id_blog);
}

$blog_id = $_GET["post_id"];

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
        <section id="commentaire">
        <div class="post">
        <?php
            echo '<form method="post" action="admin_modif_this_article.php?post_id='. $post_id . '&title=' . $title_blog .'"> 
            <textarea name="title_blog">' . $_GET["title"] . '</textarea>';
            $blogreadid = $blogManager -> readblogid($post_id);
            while ($donnees_blog = $blogreadid -> fetch(PDO::FETCH_ASSOC))
            {
                echo '<textarea id="mytextarea" name="content_blog" >'. $donnees_blog["contenu"] .'</textarea>
                <input type="submit" value="modifier" name="modif_billet">
                </form>';
            }                  
        ?>
            
        <?php echo '<form method="post" action="admin_modif.php?post_id='. $post_id . '">'?>
        <input type="submit" value="supprimer" name="detele_this_blog">
        </form>
            
        </div>
        </section>
        </body>
    </html>