<?php

namespace Controllers;

use Models\Tag_Model;
use Models\Tags_Posts_Model;

class Posts_Controller extends Main_Controller{

    public function __construct(){
        parent::__construct('views\posts\\', get_class(), "post");
    }

    public function index(){
        $template_name = DX_ROOT_DIR . $this -> views_dir . "index.php";

        include_once $this -> layout;
    }


    // Publishing a new post by the current user
    public function add(){
        if(empty($this->logged_user["user_id"])){
            header("Location: " . DX_ROOT_URL);
        }

        if(isset($_POST["post-title"]) && isset($_POST["post-body"])){
            $post_title = trim($_POST["post-title"]);
            $post_body = trim($_POST["post-body"]);
            $post_tags = explode(',', trim($_POST["tags"]));

            if(!empty($post_title) && !empty($post_body)){
                $post = array(
                    "title" => $post_title,
                    "body" => $post_body,
                    "user_id" => $_SESSION["user_id"],
                    "date_created" => $date = date('Y-m-d H:i:s', time())
                );

                $result = $this->model->add($post);

                $post_arr = $this->model->find(array(
                    "where" => "title = '" . $post_title . "'")
                );

                if(!empty($post_arr)){
                    $post = $post_arr[0];

                    include_once DX_ROOT_DIR . 'models\\tag.php';
                    $tag = new Tag_Model();

                    foreach($post_tags as $tag_name){
                        $tag->add_tag_to_post($post["id"], trim($tag_name));
                    }
                }

                header("Location: " . DX_ROOT_URL);
            }
            else{
                echo("Empty title or body are not allowed!");
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "add.php";

        include_once $this -> layout;
    }

    // Visiting a post by an anonymous user
    public function view($id){
        include_once DX_ROOT_DIR . "\\controllers\\comments.php";
        $comments_controller = new Comments_Controller();

        if(isset($_POST["author_name"]) && isset($_POST["body"])){
            $name = trim($_POST["author_name"]);
            $body = trim($_POST["body"]);
            $post_id = $_POST["post_id"];
            $email = trim($_POST["author_email"]);

            if(!empty($name) && !empty($body)){
                if(empty($email)){
                    $email = null;
                }

                $comments_controller->add($post_id, $name, $email, $body);
            }
            else{
                echo("Empty name or body are not allowed!");
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "view.php";
        // get() returns an array of 1 element and we are
        // retrieving this element
        $posts_arr = $this->model->get($id);

        if(!empty($posts_arr)){
            $post = $posts_arr[0];

            $this->model->visit($id);
            $tag_names = $this->model->get_tags($id);
            $comments = $comments_controller->get_all($id);

            include_once $this -> layout;
        }
        else{
            header("Location: " . DX_ROOT_URL);
        }
    }
}