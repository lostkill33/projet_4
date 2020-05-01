<?php
include "./model/CommentManager.php";
$commentManager = new CommentManager();
$post_id = $_GET["post_id"];

include "./model/blogManager.php";
$blogManager = new blogManager();
$blogreadid = $blogManager -> readblogid($post_id);

/***************************************/


if (!empty($_GET["title"]))
{
    $title_blog = $_GET["title"];
}

if (isset($_POST["comment_submit"]))
{
    $comment_content = $_POST["comment_content"];
    $user_id = $_SESSION["user"]["id"];
    $comment_posted = $commentManager -> create($comment_content,$user_id,$post_id);
    if ($comment_posted)
    {
        $error_msg = "Le commentaire n'a pas pu etre ajouté";
    }
    else
    {
        $succes_msg = "Le commentaire a été ajouté"; 
    }
}

if (!empty($_POST["delete_comm"]))
{
    $id_comm = $_GET["id_comm"];
    $commentManager -> delete_comm($id_comm);
}

if (!empty($_POST["report"]))
{
    $id_comm = $_GET["id_comm"];
    $report = $_POST["report"];
    $commentManager -> report($id_comm);
}

$blog_id = $_GET["post_id"];


/***************************************/

$title = 'commentaire';
require ("./view/comment.php");
require ("./view/template.php");

