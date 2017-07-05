<?php

require "base_ctrl.php";

class Api_ctrl extends Base_ctrl {

    public function __construct() {

        parent::__construct();

    }

    public function getEventData() {

        $event_id = $_POST['id'];

        $this->loadModel('events');

        $event = $this->model->getEventById($event_id);

        if($event) {
            $success = true;
        } else {
            $success = false;
        }

        echo json_encode(array("success" => $success, "event" => $event));
    }

}