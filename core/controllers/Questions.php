<?php

namespace FBLA\Controllers;

class Questions extends Controller{

    public function index(){
        
        if(user_has_unfinished_quiz('0') == true){

            $user_quiz = get_user_quiz_data('0');

            $questions = generate_questions($user_quiz['quiz_random_questions']);

            $_SESSION['error'][] = "You have an unfinished quiz, please complete this one before starting a new one.";
            
        }
        
        if(isset($_POST['submit_quiz'])){
            if(isset($_POST['radio_group'], $_POST['fill_blank'])){
                //Something...
            }else{
                $_SESSION['error'][] = "Please fill in all the questions.";
            }
        }


        $data = [
           'questions' => $questions
        ];

        $view = new \FBLA\Views\View('questions/questions', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>