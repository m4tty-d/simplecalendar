<?php

require 'base_ctrl.php';

class Admin_ctrl extends Base_ctrl {

    public function __construct() {



    }

    public function index() {

        $this->loadView('admin/metas');
        $this->loadView('admin/login');
        $this->loadView('admin/end');

    }

}