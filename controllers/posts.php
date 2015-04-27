<?php

namespace Controllers;

class Posts_Controller extends Main_Controller{

    public function __construct(){
        parent::__construct('views/posts/');
    }

    public function index(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";

        include_once $this -> layout;
    }
}