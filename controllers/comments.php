<?php

namespace Controllers;

class Comments_Controller extends Main_Controller{
    public function __construct(){
        parent::__construct('', get_class(), "comment");
    }

    public function add($post_id, $name, $email, $body){
        $name = trim($name);
        $email = trim($email);
        $body = trim($body);

        if(!empty($post_id) && !empty($name) && !empty($body)){
            $comment = array(
                "post_id" => $post_id,
                "author_name" => $name,
                "body" => $body,
                "author_email" => empty($email) ? null : $email,
                "date_created" => $date = date('Y-m-d H:i:s', time())
            );

            $this->model->add($comment);
        }
    }

    public function get_all($post_id){
        $comments = $this->model->find(array("where" => "post_id = " . $post_id));

        return $comments;
    }
}