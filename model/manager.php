<?php

class Database
{
        function db()
        {
            $db = null;
            
            try
            {
                $db = new PDO("mysql:host=localhost;dbname=blog_commentaire","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }
            catch(PDOException $exception)
            {
                echo "erreur de connection" . $exception -> getMessage();
            }
            
            return $db;
        }
}



class Database_blog
{
            function db_blog()
        {
            $db_blog = null;
            
            try
            {
                $db_blog = new PDO("mysql:host=localhost;dbname=blog_commentaire","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            }
            catch(PDOException $exception)
            {
                echo "erreur de connection" . $exception -> getMessage();
            }
            
            return $db_blog;
        }
}