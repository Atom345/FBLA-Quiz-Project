<?php

namespace FBLA\Controllers;

use \FBLA\UserData\UserData;

class Dashboard extends Controller{

    public function index(){

        if(!isset($_COOKIE['loggedin'])){
            redirect('');
        }

        $userdata = UserData::userdata();

        $data = [
            'user_data' => $user_data
        ];

        $view = new \FBLA\Views\View('dashboard/dashboard', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>