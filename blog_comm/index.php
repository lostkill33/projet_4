<?php 
session_start();

$_SESSION["role"] = null;

if( !empty($_POST["pseudo"]))
{
    $_SESSION["pseudo"] = htmlspecialchars($_POST["pseudo"]);
}

if (!empty($_GET["redirect"]))    
{
    $redirect = htmlspecialchars($_GET["redirect"]);
    if ($redirect == "admin")
    {
        require ("./admin/admin.php");
    }
    else
    {
        require ("./controller/" . $redirect . "ctrl.php");
    }

}
else
{
    require("./controller/homectrl.php");
}
