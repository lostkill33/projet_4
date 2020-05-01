<?php
include_once "manager.php";
    
class UserAdmin extends Database_blog
{
    private $table_name = "user";
    
        function createaccount($pseudo,$password)
    {
        $db = $this->db_blog();
            
        $stmt = $db -> prepare("SELECT id FROM " . $this -> table_name . ' WHERE pseudo = ?');
        $stmt -> execute([$pseudo]);
        if ($stmt -> rowCount() > 0)
        {
            return "existing_pseudo";
        }
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
            
        $stmt2 = $db -> prepare("INSERT INTO " . $this -> table_name . ' (pseudo,password,role) VALUES (?,?,0)' );
        return $stmt2 -> execute([$pseudo,$pass_hache]);
    }
    
    
    function update_pseudo($pseudo)
    {
      $db = $this->db_blog();
      $stmt = $db->prepare('UPDATE ' . $this -> table_name .  ' SET pseudo = ?  WHERE id = 1 ');
      $stmt-> execute([$pseudo]);
    
    }
    
        function update_password($thispassword,$id)
    {
      $db = $this->db_blog();
      $stmt = $db->prepare('UPDATE ' . $this -> table_name .  ' SET password = ?  WHERE id = ? ');
      $pass_hache = password_hash($thispassword, PASSWORD_DEFAULT);
      $stmt-> execute([$pass_hache,$id]);
            
    
    }
    
    function login($pseudo,$password)
    {
        $db = $this->db_blog();
        $stmt1 = $db -> prepare("SELECT password FROM " . $this -> table_name . ' WHERE pseudo = ?');
        $stmt1 -> execute([$pseudo]);
        $num = $stmt1 -> rowCount();
        
        if ($num < 1)
        {
            return "no_pseudo";
        }
        
        $result = $stmt1 -> fetch(); 

        $isPasswordCorrect = password_verify($password, $result["password"]);  
        
        if (!$isPasswordCorrect)
        {
            return "invalid_password";
        }
        
        $stmt = $db -> prepare("SELECT id,pseudo,role FROM " . $this -> table_name . ' WHERE pseudo = ?');
        $stmt -> execute([$pseudo]);
        
        if ($stmt -> rowCount() != 1)
        {
            return "other_error";
        }
        
        return $stmt;
    }
}












