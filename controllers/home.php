<?php

namespace Controllers;

use Models\Tag_Model;

class Home_Controller extends Main_Controller{
    private $posts = array();
    private $recent_posts = array();
    private $all_tags = array();
    private $popular_tags = array();

    public function __construct(){
        parent::__construct('views\home\\', get_class(), "post");

        include_once DX_ROOT_DIR . "models\\tag.php";
        $tag_model = new Tag_Model();

        $this->posts = $this->model->get_posts_with_author();
        $this->recent_posts = $this->model->get_recent_posts();
        $this->all_tags = $tag_model->get_all_tags();
        $this->popular_tags = $tag_model->get_popular_tags();
    }

    public function index(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";

        include_once $this -> layout;
    }

    public function search($tag_name){
        $this->posts = $this->model->find_by_tag_name($tag_name);

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}