<?php

class Userinfo extends Controller {
    function_construct()
    {
        parent::_construct();

    }

    function Index () {

        $this -> view("template/header");
        $is_verified = isset($_SESSION["username"]);
        if($is_verified){
            $this-> view("test/verified");

        }

        else{
            $this -> view("test/notverified");
        }

        $this -> view("template/footer");

    }

    function Login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $post_csrf = htmlentities($_POST["csrf"]);
            $cookie_csrf = $_COOKIE["csrf"];
            $session_csrf = $_SESSION["csrf"];

            if ($session_cookie == $post_csrf && $session_cookie == $cookie_csrf)
            {
                $this-> model("UsersModel");
                $clr_username = htmlentities($_POST["username"]);
                $clr_password = htmlentities($_POST["password"]);
                $verified = $this-> UsersModel -> verifiedUser($clr_username,$clr_password);
                if($verified){
                    header("location:/user/");

                }

                else{

                    echo("No verified");
                }


            }

            else{
                echo("bad csrf");

            }
        }

        else if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $csrf = random_int(10000,100000000);
            $_SESSION["csrf"] = $csrf;
            setcookie("csrf",$csrf);
            echo("session cookie::" . $_SESSION["csrf"]);
            $this->view("test/login" , array("csrf"=> $csrf));

        }
        else{
            http_response_code(405);

        }


    }

    function Logout()
    {
        session_unset();
        session_destroy();
        $_SESSION = Array();
        header("loation: /user/");
    }
}

?>
