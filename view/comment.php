
<?php ob_start(); ?>

        <section id="commentaire">
        <div class="post">
        <?php echo '<h1> ' . $_GET["title"] . ' </h1>';
            $blogreadid = $blogManager -> readblogid($post_id);
            while ($donnees_blog = $blogreadid -> fetch(PDO::FETCH_ASSOC))
            {
                echo htmlspecialchars_decode('<p>' . $donnees_blog["contenu"] . '</p>');
            }
                            
        ?>
        </div>
            
        <div class="comment">  
            <h2>Commentaire</h2>
        <?php
            if (!empty($_SESSION["user"]))
            {
            ?>
            <p>Envoyer un message</p>
            <?php 
                echo '<form method="post" action="./index.php?redirect=comment&post_id='. $post_id . '&title=' . $title_blog . '">'; 
            ?> 
            
            <textarea name="comment_content" required></textarea>
            <input type="submit" name="comment_submit" value="Envoyer">
            </form>
            <?php
            } 

            
            $readcomment = $commentManager -> read($post_id);
            while ($donnees_comment = $readcomment -> fetch(PDO::FETCH_ASSOC))
            {
                $content = $donnees_comment["content"];
                $id_comm = $donnees_comment["id"];
                $user_id = $donnees_comment["pseudo"];
                $date_commentaire = $donnees_comment["date_commentaire"];
                echo '<div class="all_comment">';
                echo '<p>' . $user_id . ' </p><p class="text_comment">' . $donnees_comment["content"] . '<br />' . $donnees_comment["date_commentaire"] . '</p>';
                if (!empty($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "1")
                {
                echo '<form method="post" action="index.php?redirect=comment&id_comm=' . $id_comm . '&post_id=' . $donnees_blog["id"] . '&title=' . $title_blog . '">' ?>
                <input type="submit" value="Supprimer" name="delete_comm">
                </form>
                <?php
                echo '</div>';
                }
                else
                {
                   echo '<form method="post" action="index.php?redirect=comment&id_comm=' . $id_comm . '&post_id=' . $blog_id . '&title=' . $title_blog . '">' ?>
                     <input type="submit" value="signaler" name="report">
                </form>
                <?php  
                echo '</div>';
                }
            }
            ?>
        </div>
        </section>

<?php $content = ob_get_clean(); ?>