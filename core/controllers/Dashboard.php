<?php

namespace FBLA\Controllers;

use \FBLA\UserData\UserData;

class Dashboard extends Controller{

    public function index(){

        /* Check if user is logged in */
        if(!isset($_COOKIE['loggedin'])){
            redirect('');
        }

        $data = [

        ];

        $view = new \FBLA\Views\View('dashboard/dashboard', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>