<?php

include_once "manager.php";
    
class BlogManager extends Database_blog
{
    private $table_name = "billets";
    
    function createblog($titre_blog,$texte_blog)
    {
        $db_blog = $this->db_blog();
        $stmt = $db_blog -> prepare("INSERT INTO " . $this -> table_name . ' (titre,contenu) VALUES (?,?)' );
        $stmt -> execute([$titre_blog,$texte_blog]);
    }
    
    
    function readblog($titre_blog,$texte_blog)
    {
        $db_blog = $this->db_blog();
        $stmt = $db_blog -> prepare("SELECT id,titre,contenu,date FROM " . $this -> table_name);
        $stmt -> execute([$titre_blog,$texte_blog]);
        return $stmt;
    }
    
    function readblogid($post_id){
        $db_blog = $this->db_blog();
        $stmt = $db_blog -> prepare("SELECT id,titre,contenu,date FROM " . $this -> table_name. " WHERE id = ?");
        $stmt -> execute([$post_id]);
        return $stmt;
    }
    
    function updateblog($title_blog,$content_blog,$id_blog)
    {
         $db_blog = $this->db_blog();
        $stmt = $db_blog -> prepare("UPDATE " . $this -> table_name . " SET titre= ?,contenu= ?  WHERE id= ?");
        $stmt -> execute([$title_blog,$content_blog,$id_blog]);
        return $stmt;         
    }
    
    function deleteblog($id_blog)
    {
        $db_blog = $this->db_blog();
        $stmt = $db_blog -> prepare("DELETE FROM " . $this -> table_name . " WHERE id= ?");
        $stmt -> execute([$id_blog]);
        return $stmt;      
    }
}