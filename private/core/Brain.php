<?php

class Brain {

    // the actual controller, it's action and the remaining parts of the url (params to the action)

    public $controller = null;
    public $action = null;
    public $url_parts = array();

    public function __construct() {

        $this->setUrlParts();

        // default controller

        if( !$this->controller ) {

            require CTRL_PATH . 'home_ctrl.php';
            $index_page = new home_ctrl();
            $index_page->index();

        }

        // we check if the controller file exists

        else if(file_exists( CTRL_PATH . $this->controller . '.php' ) && $this->controller !== "base_ctrl") {

            require CTRL_PATH . $this->controller . '.php';
            $this->controller = new $this->controller();

            if( !$this->action ) {

                $this->controller->index();

            } else if(method_exists($this->controller, $this->action)) {

                if(!empty($this->url_parts)) {

                    call_user_func(array($this->controller, $this->action), $this->url_parts);

                } else {

                    $this->controller->{$this->action}();

                }

            } else {

                require VIEW_PATH . '404.php';
            }

        }

        // if we cannot find a controller, we show the 404 page

        else {

            require VIEW_PATH . '404.php';

        }

    }

    public function setUrlParts() {

        if( isset($_GET['url_params']) ) {

            $this->url_parts = explode('/', rtrim($_GET['url_params'], '/'));

            // every controller has a _ctrl postfix in it's name, so i prepare it here

            $this->controller = isset($this->url_parts[0]) ? $this->url_parts[0] . '_ctrl' : null;

            $this->action = isset($this->url_parts[1]) ? $this->url_parts[1] : null;

            if(isset($this->url_parts[0]) && isset($this->url_parts[1]))
                unset($this->url_parts[0], $this->url_parts[1]);

        }

    }


}