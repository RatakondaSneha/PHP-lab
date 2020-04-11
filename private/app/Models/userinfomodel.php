<?php

class UserInfoModel extends Model
{
    function_construct(){

        parent::_construct();

    }

    function verifiedUser($username,$password)
    
    {
        $clr_username = $username;
        $clr_password = $password;
        $sql = "SELECT `hash_password`, `first_name`, `last_name` from authors where email = ?";
        $stmt = $this -> db-> prepare($sql);
        $count = $stmt->execute(Array($clr_username));
        $row = $stmt-> fetch();
        $hash_password = $row[0];
        $is_verified = false;

        if(isset($hash_password)){

           $is_verified = password_verify($clr_password,$hash_password);
           if($is_verified)
           {
               $_SESSION["first_name"] = $row[1];
               $_SESSION["last_name"] = $row[2];
               $_SESSION["username"] = $clr_username;
               $update_sql = "UPDATE `authors` set `last_login_date` = CURRENT_TIMESTAMP() where email = ?";
               $update_stmt = $this -> db -> prepare($update_sql);
               $update_stmt -> execute(Array($clr_username));

           }
        }
    }


}

?>