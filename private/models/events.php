<?php

require_once 'base.php';

class Events extends BaseModel {

    public function __construct() {

        parent::__construct();

    }

    public function getAllEvents() {

        $sth = $this->db->prepare("SELECT `events`.`id`, `title`, `start`, `end`, `created_by`, `users`.`username`, `users`.`first_name`, `users`.`last_name` FROM `events` left join `users` on `created_by` = `users`.`id`");

        $sth->execute();

        return $sth->fetchAll();
    }

    public function insert($title, $start, $end, $created_by) {
        $sth = $this->db->prepare("INSERT INTO events(`title`, `start`, `end`, `created_by`) VALUES(?, ?, ?, ?)");
        $sth->bindParam(1, $title);
        $sth->bindParam(2, $start);
        $sth->bindParam(3, $end);
        $sth->bindParam(4, $created_by);

        $success = $sth->execute();

        return $success;
    }

}