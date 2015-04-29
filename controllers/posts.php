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

        if(isset($_POST["post-title"]) && isset($_POST["post-body"])){
            $post_title = trim($_POST["post-title"]);
            $post_body = trim($_POST["post-body"]);

            if(!empty($post_title) && !empty($post_body)){
                $post = array(
                    "title" => $post_title,
                    "body" => $post_body,
                    "user_id" => $_SESSION["user_id"],
                    "date_created" => $date = date('Y-m-d H:i:s', time())
                );

                $result = $this->model->add($post);
                header("Location: " . DX_ROOT_URL);
            }
            else{
                echo("Empty title or body are not allowed!");
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "add.php";

        include_once $this -> layout;
    }

    public function view($id){
        include_once DX_ROOT_DIR . "/controllers/comments.php";
        $comments_controller = new Comments_Controller();

        if(!empty($_POST["author_name"]) && !empty($_POST["body"])){
            $name = $_POST["author_name"];
            $body = $_POST["body"];
            $post_id = $_POST["post_id"];
            $email = $_POST["author_email"];

            if(empty($email)){
                $email = null;
            }

            $comments_controller->add($post_id, $name, $email, $body);
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "view.php";
        // get() returns an array of 1 element and we are
        // retrieving this element
        $post = $this->model->get($id)[0];

        $this->model->visit($id);

        $this->model->initialize_tags($post["id"]);

        $comments = $comments_controller->get_all($post["id"]);

        include_once $this -> layout;
    }
}