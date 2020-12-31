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

        $level = '0';

        if($quiz_count == NULL or '0' or $quiz_count < '2'){
            $badge = '
                <div class="alert alert-info" role="alert">
                    Take 3 quizes to start earning badges.
                </div>
            ';
        }

        if($quiz_count >= '2'){
            $badge = '<span class="badge badge-secondary badge-lg"><i class = "fas fa-baby"></i> Newbie</span>';
        }

        if($quiz_count >= '10'){
            $badge = '<span class="badge badge-primary badge-lg"><i class = "fas fa-seedling"></i> Average</span>';
        }

        if($quiz_count >= '20'){
            $badge = '<span class="badge badge-danger badge-lg"><i class = "fas fa-meteor"></i> Master</span>';
        }

        if($quiz_count >= '30'){
            $badge = '<span class="badge badge-info badge-lg"><i class = "fas fa-brain"></i> Ultra Knowledge</span>';
        }

        if($quiz_count >= '40'){
            $badge = '<span class="badge badge-success badge-lg"><i class = "fas fa-globe-americas"></i> ALL KNOWING</span>';
        }

        /* Database backup for admin */
        if(isset($_POST['backup_database'])){
            if(is_admin(\FBLA\UserData\UserData::userdata('user_id') == true)){
                backup_database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            }else{
                $_SESSION['error'][] = "Permission Error.";
            }
        }

        $data = [
            'badge' => $badge,
            'quiz_count' => $quiz_count
        ];

        $view = new \FBLA\Views\View('dashboard/dashboard', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>