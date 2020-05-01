<?php ob_start(); ?>
        <div class="blog">
        <h1>BLOG</h1>

        <div class="billet">
            <?php
        
            $readblog = $blogManager -> readBlog("titre","contenu","id");
            while ($donnees_blog = $readblog -> fetch(PDO::FETCH_ASSOC))
            {
                $contenu = $donnees_blog["contenu"];
                $titre = $donnees_blog["titre"];
                echo '<div class="all_billet">';
                echo htmlspecialchars_decode('<h2>' . $donnees_blog["titre"] . ' </h2> <p class="date_post">' . $donnees_blog["date"] . '</p> <p class="text_billet">' . $donnees_blog["contenu"] . '</p>');
           
                echo '<a class="plus" href="./index.php?redirect=comment&post_id=' . $donnees_blog["id"] . '&title=' . $donnees_blog["titre"] . '">Voir plus > </a></div>';

            }
            ?>
        </div>
      </div>  

<?php $content = ob_get_clean(); ?>