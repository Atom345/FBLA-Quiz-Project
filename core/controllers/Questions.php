<?php

namespace FBLA\Controllers;

class Questions extends Controller{

    public function index(){
      
            $radio = get_random_question_type('radio');
            $blank = get_random_question_type('blank');

            setcookie('radio', json_encode($radio), time()+3600);
            setcookie('blank', json_encode($blank), time()+3600);


        if(isset($_POST['fill_blank']) and isset($_POST['submit_quiz'])){
           $radio_answer = get_correct_answer_from_question($radio['question_id']);
           $blank_answer = get_correct_answer_from_question($blank['question_id']);

           switch($radio_answer){
            case $_POST['radio_group']:
                echo "Correct!";
            break;
            default:
                echo "Incorrect!";
           }

           switch($blank_answer){
            case $_POST['fill_blank']:
                echo "Correct!";
            break;
            default:
                echo "Incorrect!";
           }
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