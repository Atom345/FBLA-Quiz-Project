<?php

/*

This is the controller file. Its job is to load and display all
requested view files and containers.

*/


namespace FBLA\Controllers;

use FBLA\Routing\Routing;
use FBLA\Traits\Paramsable;

class Controller {
    use Paramsable;

    public $views = [];

    /* Store the view files */
    public function __construct(Array $params = []) {

        $this->add_params($params);

    }

    /* Add the views files plus any data that needs to be sent. (variables, constants, etc) */
    public function addViewContent($name, $data) {

        $this->views[$name] = $data;

    }

    /* Run and output view */
    public function run() {

        if(Routing::$path == '') {

            /* Load the navbar file | layout/includes/menu.phtml */
            $menu = new \FBLA\Views\View('includes/menu', (array) $this);
            $this->addViewContent('menu', $menu->run());

            /* Load the footer file | layout/includes/footer.phtml */
            $footer = new \FBLA\Views\View('includes/footer', (array) $this);
            $this->addViewContent('footer', $footer->run());

            $wrapper = new \FBLA\Views\View(Routing::$controller_settings['container'], (array) $this);
        }

        echo $wrapper->run();
    }


}
