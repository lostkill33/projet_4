<?php



    require("./model/UserAdmin.php");

    if (isset($_POST['valider_update_pseudoadmin']))
    {
        $pseudo = $_SESSION["user"]["pseudo"];
        $UserAdmin = new UserAdmin();
        $thispseudoadmin = $_POST["update_pseudoadmin"];
        $UserAdmin -> update_pseudo($pseudo);
    }

    if (isset($_POST['valider_update_password']))
    {
        $thispassword = $_POST["update_password"];
        $UserAdmin -> update_password($thispassword);
    }



    require_once("./model/blogManager.php");
    $blogManager = new blogManager();


if(isset($_POST["titre_blog"]))
{
        $titre_blog = htmlspecialchars($_POST["titre_blog"]);
    $texte_blog = htmlspecialchars($_POST["text_blog"]);
    $blogManager -> createblog($titre_blog,$texte_blog);
}

$title = 'admin';
