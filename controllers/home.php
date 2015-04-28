<?php

namespace Controllers;

class Home_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/home/', get_class(), "post");
    }

    public function index(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        $posts = $this->model->find();

        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}