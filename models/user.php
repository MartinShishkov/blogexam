<?php

namespace Models;

class User_Model extends Main_Model{
    public function __construct(){
        parent::__construct(array(
           "table" => "users"
        ));

    }

}