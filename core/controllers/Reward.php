<?php

namespace FBLA\Controllers;

use \FBLA\UserData\UserData;

class Reward extends Controller{

    public function index(){

        $most_recent_quiz_score = get_most_recent_score(\FBLA\UserData\UserData::userdata('user_id'));

        $data = [
            'score' => $most_recent_quiz_score
        ];

        $view = new \FBLA\Views\View('reward/reward', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>