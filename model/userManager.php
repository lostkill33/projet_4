<?php
include_once "manager.php";
    
class UserManager extends Database
{
    private $table_name = "user";
    
    function create($pseudo)
    {
        $db = $this->db();
        if($this -> read_one($pseudo) -> rowCount() > 0)
        {
            return "existing_user";
        }
            
        $stmt = $db -> prepare("INSERT INTO " . $this -> table_name . " (pseudo) VALUES (?)");
        if($stmt -> execute([$pseudo]))
        {
            return $db -> lastInsertId();
        }
        else
        {
            return "error";
        }
    }
    
    function read_one($pseudo)
    {
        $db = $this->db();
        $stmt = $db -> prepare("SELECT * FROM " . $this -> table_name . ' WHERE pseudo = ? ' );
        $stmt -> execute([$pseudo]);
        return $stmt;
    }
    
    function update($pseudo,$id)
    {
      $db = $this->db();
        if($this -> read_one($pseudo) -> rowCount() > 0)
        {
            return "existing_user";
        }
      $stmt = $db->prepare('UPDATE ' . $this -> table_name .  ' SET pseudo = ?  WHERE id = ? ');
      $stmt-> execute([$pseudo,$id]);
    
    }
    
        function delete($id)
    {
        $db = $this->db();
        $stmt = $db -> prepare("DELETE FROM " . $this -> table_name . ' WHERE id = ?');
        $stmt-> execute([$id]);
    }
}



