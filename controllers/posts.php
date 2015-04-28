<?php

namespace Controllers;

class Posts_Controller extends Main_Controller{

    public function __construct(){
        parent::__construct('views/posts/', get_class(), "post");
    }

    public function index(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";

        include_once $this -> layout;
    }

    public function add(){
        if(empty($this->logged_user["user_id"])){
            header("Location: " . DX_ROOT_URL);
        }

        if(!empty($_POST["post-title"]) && !empty($_POST["post-body"])){
            $post_title = $_POST["post-title"];
            $post_body = $_POST["post-body"];

            $post = array(
                "title" => $post_title,
                "body" => $post_body,
                "user_id" => $_SESSION["user_id"]
            );

            $result = $this->model->add($post);
            header("Location: " . DX_ROOT_URL);
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "add.php";

        include_once $this -> layout;
    }

    public function view($id){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "view.php";
        // get() returns an array of 1 element and we are
        // retrieving this element
        $post = $this->model->get($id)[0];
        //$template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";
        include_once $this -> layout;
    }
}