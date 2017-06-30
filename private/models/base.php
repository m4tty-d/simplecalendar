<?php

require CORE_PATH . 'Database.php';

class Base {

    protected $db;

    public function __construct() {

        $this->db = Database::getInstance();

    }

}