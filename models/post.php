<?php

namespace Models;

class Post_Model extends Main_Model{
    private $tags = array();

    public function __construct(){
        parent::__construct(array(
            "table" => "posts"
        ));

    }

    public function find_by_tag_name($tag_name){
        $query = sprintf("SELECT * FROM %s p
INNER JOIN `posts_tags` pt
ON p.id=pt.post_id
INNER JOIN `tags` t
ON t.id=pt.tag_id
WHERE t.name='%s'",
            $this->table, mysqli_real_escape_string($this->db, $tag_name));

        $result_set = $this->db->query($query);

        $results = $this->process_results($result_set);
        return $results;
    }

    public function visit($id){
        $query = "UPDATE {$this->table} SET visits=visits + 1 WHERE id={$id}";
        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function initialize_tags($id){
        include_once DX_ROOT_DIR . 'models/tags_posts.php';
        $tags_posts = (new Tags_Posts_Model())->find();

        include_once DX_ROOT_DIR . 'models/tag.php';
        $tags = (new Tag_Model())->find();

        $tag_ids = array();
        foreach($tags_posts as $tag_post){
            if($tag_post["post_id"] === $id){
                array_push($tag_ids, $tag_post["tag_id"]);
            }
        }

        foreach($tags as $tag){
            if(in_array($tag["id"], $tag_ids)){
                array_push($this->tags, $tag["name"]);
            }
        }

        var_dump($this->tags);
    }
}