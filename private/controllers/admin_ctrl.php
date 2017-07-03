<?php

require 'base_ctrl.php';

class Admin_ctrl extends Base_ctrl {

    public function __construct() {

        session_start();

    }

    public function index() {

        // If the user is not logged in we show the login page

        if( !isset($_SESSION['user_id']) || !$_SESSION['user_id'] ) {

            $this->loadView('admin/metas');
            $this->loadView('admin/login');
            $this->loadView('admin/end');

        }

        // If the user is logged in we list the events

        else {

            $this->loadModel('users');

            $this->data['user'] = $this->model->getUserById($_SESSION['user_id']);

            $this->loadModel('events');

            $events = $this->model->getAllEvents();

            $this->data['events'] = $events;

            $this->loadView('admin/metas');
            $this->loadView('admin/list', $this->data);
            $this->loadView('admin/footer', $this->data);
            $this->loadView('admin/end');

        }

    }

    public function insert() {

        $name = $_POST['name'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $created_by = $_SESSION['user_id'];

        $this->loadModel('events');
        $success = $this->model->insert($name, $from, $to, $created_by);

        echo json_encode(array("success" => $success));
    }

    public function login() {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->loadModel('users');

        if($this->model->validate($username, $password)) {

            echo json_encode(array("success" => true), true);

        } else {

            echo json_encode(array("success" => false), true);

        }

    }

    public function logout() {

        session_destroy();

        header('Location: ' . URL . 'admin');

    }

}