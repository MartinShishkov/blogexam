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

            include_once DX_ROOT_DIR . "models\\tags_posts.php";
            $tags_posts = new Tags_Posts_Model();

            $tag_post = array(
                "post_id" => $post_id,
                "tag_id" => $tag["id"],
            );

            $tags_posts->add($tag_post);
        }
    }

    public function get_popular_tags(){
        $query = sprintf("SELECT t.name, count(1) as NumberOfPosts FROM posts p
INNER JOIN posts_tags pt
ON p.id=pt.post_id
INNER JOIN tags t
ON t.id=pt.tag_id
GROUP BY t.name
ORDER BY NumberOfPosts DESC
LIMIT 4");

        $result_set = $this->db->query($query);

        $tags = $this->process_results($result_set);

        $tag_names = array();
        foreach($tags as $tag){
            $tag_names[$tag["name"]] = $tag["NumberOfPosts"];
        }

        return $tag_names;
    }

    public function get_all_tags(){
        $query = sprintf("SELECT t.name FROM tags t");

        $result_set = $this->db->query($query);

        $tags = $this->process_results($result_set);

        $tag_names = array();
        foreach($tags as $tag){
            $tag_names[] = $tag["name"];
        }

        return $tag_names;
    }
}