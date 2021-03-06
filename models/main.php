<?php

namespace Models;

class Main_Model{
    protected $table;
    protected $limit;
    protected $db;

    public function __construct($args = array()){
        $defaults = array(
          'limit' => 0,
        );

        $args = array_merge($defaults, $args);

        if(!isset($args["table"])){
            die("Table not defined");
        }

        extract($args);
//        $table = $args["table"];
//        $limit = $args["limit"];

        $this->table = $table;
        $this->limit = $limit;

        $db_object = \Lib\Database::get_instance();
        $this->db = $db_object->get_db();
    }

    public function find($args = array()){
        $defaults = array(
            'table' => $this->table,
            'limit' => $this->limit,
            'where' => '',
            'columns' => '*'
        );

        $args = array_merge($defaults, $args);

        extract($args);

        $query = "SELECT {$columns} FROM {$table}";

        if(!empty($where)){
            $query .= " WHERE {$where}";
        }

        if(!empty($limit)){
            $query .= " LIMIT {$limit}";
        }

        $result_set = $this->db->query($query);
        $results = $this->process_results($result_set);

        return $results;
    }

    public function add($element){
        $keys = array_keys($element);
        $values = array();

        foreach($element as $key => $value){
            $values[] = "'" . $this->db->real_escape_string($value) . "'";
        }

        $keys = implode($keys, ',');
        $values = implode($values, ',');

        $query = "INSERT INTO {$this->table}($keys) VALUES ($values)";

        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function get($id){
        return $this->find(array("where" => "id = " . $id));
    }

    protected function process_results($result_set){
        $results = array();

        if(!empty($result_set) && $result_set->num_rows > 0){
            while($row = $result_set->fetch_assoc()){
                $results[] = $row;
            }
        }

        return $results;
    }
}