<header>
    <div class="sous_header">
        <h1 class="titre_logo"><a href="index.php?redirect=home">Jean Forteroche blog !</a></h1>
        <nav>
            <ul class="menutop">
                <li><a href="index.php?redirect=blog">Blog</a></li>
                <?php 

                if (!empty($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "1")
                {
                    ?>
                    <li><a href="./admin/admin.php">admin</a></li>
                    <?php
                }
                
                                if (empty($_SESSION["user"]))
                {
                    ?>
                    <li><a href="index.php?redirect=connection">connection/inscription</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="index.php?redirect=account">Compte</a></li>
                    <li><a href="index.php?redirect=home&signout=true">deconnection</a></li>
                    <?php
                }

                ?>
                <li><a href="index.php?redirect=contact">contact</a></li>
            </ul>
        </nav>

         <?php 
               if (!empty($_SESSION["user"]["pseudo"]))
                {
                   echo '<p class="session_pseudo">' . $_SESSION["user"]["pseudo"] . " </p>";
                }
        ?>
    </div>
</header>