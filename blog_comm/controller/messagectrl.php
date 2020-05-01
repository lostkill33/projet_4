<?php
require_once("./model/userManager.php");
$userManager = new UserManager();
if (isset($_POST["create"]) )
{
  if(empty($_POST["pseudo"]))
  {
        header("Location: ./index.php?error=no_pseudo" );
  }
  else
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $result = $userManager -> create($pseudo);
    if($result == "existing_user" || $result == "error")
    {
        header("Location: ./index.php?error=" . $result );
    }
    else
    {
        $user = $userManager -> read_one($pseudo) -> fetch(PDO::FETCH_ASSOC);
        $_SESSION["id"] = $user["id"];
        $_SESSION["pseudo"] = $user["pseudo"];
    }
  }
}

if (isset($_POST["modif"]))
{
    $new_pseudo = !empty($_POST['modifier_pseudo']) ? htmlspecialchars($_POST['modifier_pseudo']) : NULL;
    if ($new_pseudo != NULL)
    {

        $userid = $_SESSION["id"];
        $userManager -> update($new_pseudo,$userid);
        $pseudo = $new_pseudo;
        $_SESSION["pseudo"] = $new_pseudo;

    }
}

if (isset($_POST["delete"]))
{
    $userid = $user["id"];
    $userManager -> delete($userid);
    header("Location: ./index.php");
}

//--------------------------------------------------------------
require_once("./model/messageManager.php");


if (isset($_POST["message"]))
{
    $id = $_SESSION["id"];
    $message = htmlspecialchars($_POST["message"]);  
    $messageManager = new userMessage(); 
    $messageManager -> createMessage($message,$id);
}

$title = 'message';
require ("./view/message.php");
require ("./view/template.php");