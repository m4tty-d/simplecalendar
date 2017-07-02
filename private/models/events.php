<?php

require 'base.php';

class Events extends BaseModel {

    public function __construct() {

        parent::__construct();

    }

    public function getAllEvents() {

        $sth = $this->db->prepare("select * from events");

        $sth->execute();

        return $sth->fetchAll();
    }

}