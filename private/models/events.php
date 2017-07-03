<?php

require_once 'base.php';

class Events extends BaseModel {

    public function __construct() {

        parent::__construct();

    }

    public function getAllEvents() {

        $sth = $this->db->prepare("select * from events");

        $sth->execute();

        return $sth->fetchAll();
    }

    public function insert($name, $from, $to, $created_by) {
        $sth = $this->db->prepare("INSERT INTO events(`name`, `from`, `to`, `created_by`) VALUES(?, ?, ?, ?)");
        $sth->bindParam(1, $name);
        $sth->bindParam(2, $from);
        $sth->bindParam(3, $to);
        $sth->bindParam(4, $created_by);

        $success = $sth->execute();

        return $success;
    }

}