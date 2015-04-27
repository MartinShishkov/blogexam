<?php

namespace Controllers;

class Main_Controller{
    protected $layout;

    protected $views_dir;

    public function __construct($views_dir = '/views/main/',
                                $class_name = '\Controllers\Master_Controller',
                                $model = 'master')
    {
        $this -> views_dir = $views_dir;
        $this->class_name = $class_name;
        //$this->model = $model;
        include_once DX_ROOT_DIR . "models\\{$model}.php";
        $model_class = "\Models\\" . ucfirst($model) . "_Model";

        $this->model = new $model_class(array("table" => "none"));

        $this -> layout = DX_ROOT_DIR . 'views/shared/_layout.php';
    }

}