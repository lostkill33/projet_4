<?php
include_once "manager.php";
    
class CommentManager extends Database
{
    private $table_name = "commentaires";
    
    function create($content,$user_id,$post_id)
    {
        $db = $this->db();
        $stmt = $db -> prepare("INSERT INTO " . $this -> table_name . ' (content,user_id,billet_id,date_commentaire) VALUES (?,?,?,NOW())' );
        $stmt -> execute([$content,$user_id,$post_id]);
    }
    
    function read($billet_id)
    {
        $db = $this->db();
        $stmt = $db -> prepare("SELECT content,date_commentaire,pseudo,c.id AS id FROM " . $this -> table_name . " c INNER JOIN user u ON u.id = c.user_id WHERE billet_id = ?");
        $stmt -> execute([$billet_id]);
        return $stmt;
    }
    
        function readall_id()
    {
        $db = $this->db();
        $stmt = $db -> prepare("SELECT content, commentaires.id, user.pseudo, billets.titre FROM " . $this -> table_name . ", user, billets WHERE commentaires.billet_id = billets.id AND commentaires.user_id = user.id");
        $stmt -> execute();
        return $stmt;
    }
    
        function delete_comm($id_comm)
    {
        $db = $this->db();
        $stmt = $db -> prepare("DELETE FROM " . $this -> table_name . " WHERE id= ?");
        $stmt -> execute([$id_comm]);
        return $stmt;           
    }
    
    function report($id_comm)
    {
        $db = $this->db();
        $stmt = $db -> prepare("UPDATE " . $this -> table_name . " SET report= 1  WHERE id= ?");
        $stmt -> execute([$id_comm]);
        return $stmt; 
    }
    
    function read_report()
    {
        $db = $this->db();
        $stmt = $db -> prepare("SELECT content, commentaires.id, user.pseudo, billets.titre FROM " . $this -> table_name . ", user, billets WHERE commentaires.billet_id = billets.id AND commentaires.user_id = user.id AND report = 1");
        $stmt -> execute();
        return $stmt;
    }
    
    function unreport($id_comm)
    {
        $db = $this->db();
        $stmt = $db -> prepare("UPDATE " . $this -> table_name . " SET report= 0  WHERE id= ?");
        $stmt -> execute([$id_comm]);
        return $stmt;   
    }
}