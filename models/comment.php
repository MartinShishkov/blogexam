<?php

namespace Models;

class Comment_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "comments"
        ));
    }

    public function create($post_id, $name, $email, $body){
        $name = trim($name);
        $email = trim($email);
        $body = trim($body);

        if(!empty($post_id) && !empty($name) && !empty($body)){
            $comment = array(
                "post_id" => $post_id,
                "author_name" => htmlspecialchars($name),
                "body" => htmlspecialchars($body),
                "author_email" => empty($email) ? null : htmlspecialchars($email),
                "date_created" => $date = date('Y-m-d H:i:s', time())
            );

            $this->add($comment);
        }
    }

    public function get_all($post_id){
        $comments = $this->find(array("where" => "post_id = " . $post_id));

        return $comments;
    }
}