<?php

namespace FBLA\Controllers;

class Questions extends Controller{

    public function index(){

        /* Get random questions */
        $radio = get_random_question_type('radio');
        $blank = get_random_question_type('blank');

        if(isset($_POST['radio_group'])){
           $radio_answer = get_correct_answer_from_question($radio['question_id']);
           $blank_answer = get_correct_answer_from_question($blank['question_id']);
        }

        $data = [
            'radio_data' => $radio,
            'blank_data' => $blank
        ];

        $view = new \FBLA\Views\View('questions/questions', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>