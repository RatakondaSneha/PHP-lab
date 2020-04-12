<?php

class UserInfo extends Controller {

    function __construct() {
        parent::__construct();
    }

    function Index () {
        $this->view("template/header");

        $is_authenticated = isset($_SESSION["username"]);
        if($is_authenticated){
            $this->view("main/verified");
        }else{
            $this->view("main/notverified");
        }
        
        $this->view("template/footer");
    } 

    function Login(){
         if($_SERVER["REQUEST_METHOD"] == "POST"){
           $post_csrf = htmlentities($_POST["csrf"]);
           $cookie_csrf = $_COOKIE["csrf"];
           $sess_cookie = $_SESSION["csrf"];
           if($sess_cookie == $post_csrf && $sess_cookie == $cookie_csrf){
            $this->model("UserInfoModel");
            $clean_username = htmlentities($_POST["username"]);
        $clean_password = htmlentities($_POST["password"]);
        $authenticate = $this->UserInfoModel->verifiedUser($clean_username,$clean_password);
        if($authenticate){
            header("location: /userinfo/");
        }else{
          
            echo("No authenticated");
        }
    }else{
        echo("bad csrf");
    }
    }else if($_SERVER["REQUEST_METHOD"] == "GET"){
       $csrf = random_int(10000,100000000);
        setcookie("csrf",$csrf);
        $_SESSION["csrf"] = $csrf;
        $this->view("main/login" , array("csrf" => $csrf));
    
}else{
        http_response_code(405);
           
    }
        
    }
    function Logout(){
        
        session_destroy();
        session_unset();
        $_SESSION = Array();
        $this->view("main/logout");
    }

}

?>