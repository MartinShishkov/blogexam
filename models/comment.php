<?php

namespace Models;

class Comment_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "comments"
        ));
    }


}