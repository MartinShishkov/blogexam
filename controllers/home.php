<?php

namespace Controllers;

use Models\Tag_Model;

class Home_Controller extends Main_Controller{
    private $posts = array();
    private $recent_posts = array();
    private $all_tags = array();
    private $popular_tags = array();
    private $page_size = 5;
    private $start_page = 0;

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
        if(isset($_GET["search"])){
            $tag_name = $_GET["search"];

            $this->posts = $this->model->find_by_tag_name(htmlspecialchars($tag_name));
        }

        if(isset($_GET["page"])){
            $page = $_GET["page"];

            $this->posts = array_slice($this->posts, $page * $this->page_size, $this->page_size, true);
        }
        else{
            $this->posts = array_slice($this->posts, $this->start_page * $this->page_size, $this->page_size, true);
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";


        include_once $this -> layout;
    }
}