<?php

namespace Controllers;

use Models\Tag_Model;

class Home_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/home/', get_class(), "post");
    }

    public function index(){
        $posts = $this->model->find();

        if(!empty($_POST["search"])){
            $posts = $this->model->find_by_tag_name($_POST["search"]);
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";


        include_once DX_ROOT_DIR . 'models/tag.php';
        $tag = new Tag_Model();

        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}