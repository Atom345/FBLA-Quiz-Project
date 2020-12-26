<?php

namespace FBLA\Controllers;

class Dashboard extends Controller{

    public function index(){

        if(!isset($_COOKIE['loggedin'])){
            redirect('');
        }

        $fetched_email_from_cookie = master_key('decrypt', $_COOKIE['loggedin']);
        $user_data = get_user_data_from_email($fetched_email_from_cookie);

        $data = [
            'user_data' => $user_data
        ];

        $view = new \FBLA\Views\View('dashboard/dashboard', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>