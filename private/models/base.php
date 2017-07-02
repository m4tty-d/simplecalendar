<?php

require CORE_PATH . 'Database.php';

class BaseModel {

    protected $db;

    public function __construct() {

        $this->db = Database::getInstance();

    }

}