<?php

class Base_ctrl {

    protected $model = null;

    public function __construct() {

    }

    public function loadModel($model) {

        require MODEL_PATH . $model . '.php';
        $this->model = new $model();

    }

    public function loadView($view) {
        require VIEW_PATH . $view . '.php';
    }
}