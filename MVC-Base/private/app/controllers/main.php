<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * http://localhost/
     */
    function Index () {

        $this->view("template/header");
        $this->view("main/index");
        $this->view("template/footer");
        
    }

    function Other () {

        $this->view("template/header");
        $this->view("main/other");
        echo("<br><br><br>hello there");
        $this->view("template/footer");
        
    }
    function Arcylicpaints () {

        $this->view("template/header");
        $this->view("main/arcylicpaint");
        $this->view("template/footer");
        
    }
    function Glasspainting () {

        $this->view("template/header");
        $this->view("main/glasspainting");
        $this->view("template/footer");
        
    }

}

?>