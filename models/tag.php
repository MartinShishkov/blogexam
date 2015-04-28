<?php

namespace Models;

class Tag_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
            "table" => "tags"
        ));
    }
}