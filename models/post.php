<?php

namespace Models;

class Post_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "posts"
        ));

    }
}