<?php

namespace Controllers;

use Models\Tag_Model;

class Home_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views\home\\', get_class(), "post");
    }

    public function index(){
        $posts = $this->model->get_posts_with_author();
        $recent_posts = $this->model->get_recent_posts();

        include_once DX_ROOT_DIR . "models\\tag.php";
        $tag_model = new Tag_Model();
        $popular_tags = $tag_model->get_popular_tags();

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        var_dump($template_name);

        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }

    public function search($tag_name){
        include_once DX_ROOT_DIR . 'models\\tag.php';
        $tag_model = new Tag_Model();

        $posts = $this->model->find_by_tag_name($tag_name);
        $recent_posts = $this->model->get_recent_posts();

        $popular_tags = $tag_model->get_popular_tags();

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}