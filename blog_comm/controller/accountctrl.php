<?php

  require("./model/userManager.php");
    require("./model/UserAdmin.php");

if (!empty($_POST["valider_update_pseudoadmin"]))
{
    $userManager = new userManager();
    $pseudo = $_POST["update_pseudoadmin"];
    $id = $_SESSION["user"]["id"];
    $userManager -> update($pseudo,$id);
    $_SESSION["user"]["pseudo"] = $pseudo;
}

if (!empty($_POST["valider_update_password"]))
{
    $UserAdmin = new UserAdmin();
    $thispassword = $_POST["update_password"];
    $id = $_SESSION["user"]["id"];
    $UserAdmin -> update_password($thispassword,$id);
}

$title = 'compte';
require ("./view/account.php");
require ("./view/template.php");