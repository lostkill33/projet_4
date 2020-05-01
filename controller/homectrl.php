<?php


 require_once("./model/UserAdmin.php");
    $userAdmin = new UserAdmin();


if(isset($_POST["valider_insciption"]))
{
    $pseudo = htmlspecialchars($_POST["pseudo_insciption"]);
    $password = htmlspecialchars($_POST["password_insciption"]);
    $result = $userAdmin -> createaccount($pseudo,$password);
    
    if ($result == "existing_pseudo")
    {
        $error_msg = "Pseudo existant";
    }
    elseif ($result)
    {
        $succes_msg = "inscription réussi";
        $_SESSION["pseudo"] = $pseudo;
    }
    else
    {
        $error_msg = "inscription échouer erreur inconnue";
    }
}


/*if(!empty($_GET["error"]))
{
    echo "une erreur et survenu: " . htmlspecialchars($_GET["error"]);
}*/

if(!empty($_GET["signout"]))
{
    $_SESSION["user"] = null;
    $succes_msg = "Vous ete déconnecter";
}

$title = 'accueil';
require ("./view/home.php");
require ("./view/template.php");