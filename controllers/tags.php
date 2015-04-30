<?php

namespace Controllers;

class Tags_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('views\tags\\', get_class(), "tag");
    }

    public function add(){
        if(!isset($this->logged_user["username"])){
            header("Location: " . DX_ROOT_URL);
        }

        if(isset($_POST["tag_name"])){
            $tag_name = htmlspecialchars(trim($_POST["tag_name"]));

            if(!empty($tag_name) && $_POST["formToken"] === $_SESSION["formToken"]){
                $tag = array(
                    "name" => $tag_name
                );

                $result = $this->model->add($tag);

                header("Location: " . DX_ROOT_URL);
            }
            else{
                echo("Empty tag names are not allowed!");
            }
        }

        $template_name = DX_ROOT_DIR . $this -> views_dir . "add.php";

        include_once $this -> layout;
    }
}