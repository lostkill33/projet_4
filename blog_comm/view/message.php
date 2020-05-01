
<?php ob_start(); ?>
        <h1>Message</h1>
        <?php echo $_SESSION["pseudo"]; ?><br /><br />
        <form method="post" action="./index.php?redirect=message">
        <input type="text" placeholder="modifier pseudo" name="modifier_pseudo"> <br /><br />
        <input type="submit" value="supprimer" name="delete"> <br /><br />
        <input type="submit" value="modifier" name="modif"><br /><br />
        </form>
        
        <form method="post" action="./index.php?redirect=message">
            <input type="text" placeholder="Message" name="message">
            <input type="submit" value="valider message" name="valider_message">
        </form>
        <br />
        
        <section id="message">
        <?php
                if (isset($_POST["message"]))
        {
            $readid = $messageManager -> readMessage($message,$id);
            while ($donnees = $readid -> fetch(PDO::FETCH_ASSOC))
            {
                echo '<p class="message">' . $donnees["text"] . '<br />' . $donnees["pseudo"] . '<br />' . $donnees["date"] . ' </p>' ;
            }
        }
        ?>
        
        </section>
 
        <a href="./index.php"> Retour vers l'accueil </a>
<?php $content = ob_get_clean(); ?>