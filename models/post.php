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
        $query = sprintf("SELECT p.id, p.title, p.body, p.date_created, p.visits FROM %s p
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

    public function get_tags($id){
        //SELECT t.name FROM tags t INNER JOIN posts_tags pt ON t.id=pt.tag_id INNER JOIN posts p ON p.id=pt.post_id WHERE p.id=32

        $query = sprintf("SELECT t.name FROM tags t
INNER JOIN posts_tags pt
ON t.id=pt.tag_id
INNER JOIN posts p
ON p.id=pt.post_id
WHERE p.id= %d", mysqli_real_escape_string($this->db, $id));

        $result_set = $this->db->query($query);

        $tags = $this->process_results($result_set);

        $tag_names = array();
        foreach($tags as $tag){
            array_push($tag_names, $tag["name"]);
        }

        return $tag_names;
    }
}