<?php

namespace Models;

class Tag_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "tags"
        ));
    }

    public function add_tag_to_post($post_id, $tag_name){
        $tag_arr = $this->find(array(
            "where" => "name = '" . mysqli_real_escape_string($this->db, $tag_name) . "'"
        ));

        if(!empty($tag_arr)){
            $tag = $tag_arr[0];

            include_once DX_ROOT_DIR . "models/tags_posts.php";
            $tags_posts = new Tags_Posts_Model();

            $tag_post = array(
                "post_id" => $post_id,
                "tag_id" => $tag["id"],
            );

            $tags_posts->add($tag_post);
        }
    }
}