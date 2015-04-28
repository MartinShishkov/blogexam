<?php

namespace Models;

class Post_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "posts"
        ));
    }

    public function visit($id){
        $query = "UPDATE {$this->table} SET visits=visits + 1 WHERE id={$id}";
        $this->db->query($query);

        return $this->db->affected_rows;
    }
}