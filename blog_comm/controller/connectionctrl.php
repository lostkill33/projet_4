<?php
 
    if (!empty($_POST["pseudo_admin"]) && !empty($_POST["password"]))
    {
        require_once("./model/UserAdmin.php");
        $UserAdmin = new UserAdmin();

        $pseudo_admin = htmlspecialchars($_POST["pseudo_admin"]);
        $password = htmlspecialchars($_POST["password"]);
        
        $result = $UserAdmin -> login($pseudo_admin,$password);
        if ($result == "no_pseudo")
        {
            $error_msg = "Pas de pseudo";
        }
        elseif ($result == "invalid_password")
        {
           $error_msg = "Mauvais mot de passe";
        }
        elseif ($result == "other_error")
        {
            $error_msg = "erreur inconnue";
        }
        else
        {
            $user = $result -> fetch();
            $_SESSION["user"] = $user;
            $succes_msg = "connection reussi !";
        }
    }




$title = 'connection';
require ("./view/connection.php");
require ("./view/template.php");