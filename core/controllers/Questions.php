<?php

namespace FBLA\Controllers;

class Questions extends Controller{

    public function index(){
        
        if(!isset($_COOKIE['loggedin'])){
            redirect('register');
        }

        $user_data = get_user_data_from_email(master_key('decrypt', $_COOKIE['loggedin']));

        if(user_has_unfinished_quiz($user_data['user_id']) == true){

            $user_quiz = get_user_quiz_data($user_data['user_id']);

            $questions = send_questions($user_quiz['quiz_random_questions']);

            $_SESSION['error'][] = "You have an unfinished quiz, please complete this one before starting a new one.";
            
        }else{
            $quiz_numbers = generate_quiz_number_set();
            $user_id = $user_data['user_id'];
            $quiz_timestamp = "2020";
            $quiz_status = "false";

            $stmt = \FBLA\Database\Database::$db->prepare('INSERT INTO `quiz_progress` (`user_id`, `quiz_random_questions`, `quiz_timestamp`, finished) VALUES (?,?,?,?)'); 
            $stmt->bind_param("ssss", $user_id, $quiz_numbers, $quiz_timestamp, $quiz_status);
            $stmt->execute();

            $questions = send_questions($quiz_numbers);

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