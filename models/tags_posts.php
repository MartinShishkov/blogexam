<?php

namespace Models;

class Tags_Posts_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "posts_tags"
        ));
    }
}