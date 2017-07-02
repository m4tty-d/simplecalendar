<?php

require 'base.php';

class Users extends BaseModel {

    public function __construct() {

        parent::__construct();

    }

    public function validate($username, $password) {

        $sth = $this->db->prepare("select * from users where username = ?");

        $sth->bindParam(1, $username);

        $sth->execute();

        $user = $sth->fetch();

        // username found

        if($sth->rowCount() > 0) {

            // Everything OK

            if(password_verify($password, $user->password)) {

                $_SESSION['user_id'] = $user->id;

                return true;

            }

            // password doesn't match

            else {

                return false;

            }

        }

        // username not found

        else {

            return false;

        }

    }

}