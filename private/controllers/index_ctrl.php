<?php

require 'base_ctrl.php';

class Index_ctrl extends Base_ctrl {

    public function __construct() {

    }

    public function index() {

        $this->loadView('metas');
        $this->loadView('home');
        $this->loadView('end');

    }
}