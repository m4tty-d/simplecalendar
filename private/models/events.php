<?php

require_once 'base.php';

class Events extends BaseModel {

    public function __construct() {

        parent::__construct();

    }

    public function getAllEvents() {

        $sth = $this->db->prepare("select `events`.`id`, `title`, `start`, `end`, `created_by`, `users`.`username`, `users`.`first_name`, `users`.`last_name` from `events` left join `users` on `created_by` = `users`.`id`");

        $sth->execute();

        return $sth->fetchAll();
    }

    public function insert($title, $start, $end, $created_by) {
        $sth = $this->db->prepare("insert into events(`title`, `start`, `end`, `created_by`) values(?, ?, ?, ?)");
        $sth->bindParam(1, $title);
        $sth->bindParam(2, $start);
        $sth->bindParam(3, $end);
        $sth->bindParam(4, $created_by);

        $success = $sth->execute();

        return $success;
    }

    public function delete($id) {
         $sth = $this->db->prepare("delete from events where id = ?");
         $sth->bindParam(1, $id);

         $success = $sth->execute();

         return $success;
    }

}