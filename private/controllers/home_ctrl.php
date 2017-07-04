<?php

require 'base_ctrl.php';

class Home_ctrl extends Base_ctrl {

    public function __construct() {

    }

    public function index() {

        $this->loadView('metas');
        $this->loadView('home');
        $this->loadView('end');

    }

    public function provideEventData() {

        $this->loadModel('events');
        $events = $this->model->getAllEvents();

        echo json_encode($events);

    }
}