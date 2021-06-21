<?php

namespace FBLA\Controllers;

use \FBLA\UserData\UserData;

class Dashboard extends Controller{

    public function index(){

        /* Check if user is logged in */
        if(!isset($_COOKIE['loggedin'])){
            redirect('');
        }

        $fetch_recent_quizes = get_five_recent_completed_quizes(\FBLA\UserData\UserData::userdata('user_id'));
        $quiz_count = count_quizes(\FBLA\UserData\UserData::userdata('user_id'));

        /* Database backup for admin */
        if(isset($_POST['backup_database'])){
            if(is_admin(\FBLA\UserData\UserData::userdata('user_id') == true)){
                backup_database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            }else{
                $_SESSION['error'][] = "Permission Error.";
            }
        }

        $data = [
            'quiz_count' => $quiz_count
        ];

        $view = new \FBLA\Views\View('dashboard/dashboard', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>
