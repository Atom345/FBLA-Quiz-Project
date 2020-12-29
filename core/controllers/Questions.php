<?php

namespace FBLA\Controllers;

class Questions extends Controller{

    public function index(){
        
        /* Check if user is logged in */
        if(!isset($_COOKIE['loggedin'])){
            redirect('register');
        }

        /* Set quiz status */
        $quiz_complete = false;

        /* Get the data of the current user based on the encyrpted email cookie value */
        $user_data = get_user_data_from_email(master_key('decrypt', $_COOKIE['loggedin']));

        /* Check if user has a unfinished quiz and restore the questions, otherwise, generate and store new questions. */
        if(user_has_unfinished_quiz($user_data['user_id']) == true){

            $user_quiz = get_user_quiz_data($user_data['user_id']);

            $questions = send_questions($user_quiz['quiz_random_questions']);

            $_SESSION['error'][] = "You have an unfinished quiz, please complete this one before starting a new one.";
            
        }else{
            $quiz_numbers = generate_quiz_number_set();
            $user_id = $user_data['user_id'];
            $quiz_timestamp = get_time();
            $quiz_status = "false";

            /* Create new quiz */
            $stmt = \FBLA\Database\Database::$db->prepare('INSERT INTO `quiz_progress` (`user_id`, `quiz_random_questions`, `quiz_timestamp`, finished) VALUES (?,?,?,?)'); 
            $stmt->bind_param("ssss", $user_id, $quiz_numbers, $quiz_timestamp, $quiz_status);
            $stmt->execute();

            /* Send the questions to the view (view/layout/questions/questions.phtml) */
            $questions = send_questions($quiz_numbers);

        }
        
        /* If the quiz is submitted, check that the forms are filled in and check answers */
        if(isset($_POST['submit_quiz'])){
          
            if(isset($_POST['radio_group'], $_POST['fill_blank'], $_POST['select'])){
                $quiz_complete = true;
                
                //More stuff
                
            }else{
                $quiz_complete = false;
                $_SESSION['info'][] = "Please fill in all the questions.";
            }
        }

        /* Send data to the view */
        $data = [
           'questions' => $questions,
           'quiz_complete' => $quiz_complete
        ];

        $view = new \FBLA\Views\View('questions/questions', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>