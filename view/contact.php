<?php ob_start(); ?> 

        <div class="contact">
        <h1>Contact</h1>
            
            <form method="post" action="./index.php?redirect=contact">
                <input type="text" placeholder="Nom" name="nom" required>
                <input type="text" placeholder="prenom" name="prenom" required>
                <input type="email" placeholder="E-mail" name="email" required>
                <textarea placeholder="Message" name="message" required></textarea>
                <input type="submit" value="inscription" name="valider_insciption">
            </form>
            
        </div>	

<?php $content = ob_get_clean(); ?>