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
            $location = DX_ROOT_DIR . '/users/login.php';
            var_dump($location);
            //header("Location: " . $location);
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
            var_dump($result);
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "add.php";

        include_once $this -> layout;
    }
}