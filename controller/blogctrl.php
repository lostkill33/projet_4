<?php


    require_once("./model/blogManager.php");
    $blogManager = new blogManager();


if(isset($_POST["titre_blog"]))
{
        $titre_blog = htmlspecialchars($_POST["titre_blog"]);
    $texte_blog = htmlspecialchars($_POST["text_blog"]);
    $blogManager -> createblog($titre_blog,$texte_blog);
}

$title = 'blog';
require ("./view/blog.php");
require ("./view/template.php");