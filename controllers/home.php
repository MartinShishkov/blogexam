<?php

namespace Controllers;

use Models\Tag_Model;

class Home_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views/home/', get_class(), "post");
    }

    public function index(){
        $posts = $this->model->find();

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";

        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }

    public function search($tag_name){
        include_once DX_ROOT_DIR . 'models/tag.php';
        $tag = new Tag_Model();
        $posts = $this->model->find_by_tag_name($tag_name);

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}