<?php

namespace Models;

class Post_Model extends Main_Model{
    private $tags = array();

    public function __construct(){
        parent::__construct(array(
            "table" => "posts"
        ));

    }

    public function get_posts_with_author(){
        //SELECT p.id, p.title, p.body, p.date_created, p.visits, u.username FROM posts p INNER JOIN users u ON p.user_id=u.id
        $query = sprintf("SELECT p.id, p.title, p.body, p.date_created, p.visits, u.username FROM posts p INNER JOIN users u ON p.user_id=u.id");

        $result_set = $this->db->query($query);

        $results = $this->process_results($result_set);
        return $results;
    }

    public function find_by_tag_name($tag_name){
        $query = sprintf("SELECT p.id, p.title, p.body, p.date_created, p.visits, u.username FROM %s p
INNER JOIN `posts_tags` pt
ON p.id=pt.post_id
INNER JOIN `tags` t
ON t.id=pt.tag_id
INNER JOIN `users` u
ON p.user_id=u.id
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

    public function get_recent_posts(){
        //
        $query = sprintf("SELECT p.id, p.title, p.body, p.date_created, u.username FROM posts p
INNER JOIN `users` u
ON p.user_id=u.id
ORDER BY p.date_created DESC LIMIT 4");

        $result_set = $this->db->query($query);
        $recent_posts = $this->process_results($result_set);
        return $recent_posts;
    }
}