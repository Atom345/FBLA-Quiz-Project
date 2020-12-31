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

        /* Check if user has a unfinished quiz and restore the questions, otherwise, generate and store new questions. */
        $unfinished_quiz = user_has_unfinished_quiz(\FBLA\UserData\UserData::userdata('user_id'));
        if($unfinished_quiz !== false){
            $user_quiz = get_quiz_data(strval($unfinished_quiz['quiz_id']));
            $quiz_numbers = $unfinished_quiz['questions'];
            $new_quiz_id = $unfinished_quiz['quiz_id'];
            $questions = send_questions($quiz_numbers);

            $_SESSION['error'][] = "You have an unfinished quiz, please complete this one before starting a new one.";
            
        }else{
            if(!isset($_POST['submit_quiz'])){
            $quiz_numbers = generate_quiz_number_set();
            $user_id = \FBLA\UserData\UserData::userdata('user_id');
            $quiz_timestamp = get_time();
            $quiz_status = "false";
            $null = null;

            /* Create new quiz */
            $stmt = \FBLA\Database\Database::$db->prepare('INSERT INTO `quiz_progress` (`user_id`, `quiz_random_questions`, `quiz_timestamp`, `finished`, `score`) VALUES (?,?,?,?,?)'); 
            $stmt->bind_param("sssss", $user_id, $quiz_numbers, $quiz_timestamp, $quiz_status, $null);
            $stmt->execute();
            $new_quiz_id = $stmt->insert_id;
            $stmt->close();

            /* Send the questions to the view (view/layout/questions/questions.phtml) */
            $questions = send_questions($quiz_numbers);
            }
        }


        /* If the quiz is submitted, check that the forms are filled in and check answers */
        if(isset($_POST['submit_quiz'])){
          
            if(isset($_POST['radio_group'], $_POST['fill_blank'], $_POST['select'])){
                $quiz_complete = true;
               
                $correct_answers = get_correct_answer_from_questions($quiz_numbers);

                /* Set the starting score */
                    $score = "0/5";
                if($correct_answers['radio'] == $_POST['radio_group']){
                    $score = "1/5";
                }
                if($correct_answers['blank'] == $_POST['fill_blank']){
                    $score = "2/5";
                }
                if($correct_answers['select'] == array_sum($_POST['select'])){
                    $score = "3/5";
                }

                $quiz_user_id = \FBLA\UserData\UserData::userdata('user_id');
              
                $quiz_id = strval($new_quiz_id);

                /* Set the quiz score */
                $stmt = \FBLA\Database\Database::$db->prepare("UPDATE `quiz_progress` SET score=? WHERE quiz_id=?"); 
                $stmt->bind_param("ss", $score, $quiz_id);
                $stmt->execute();

                 /* Set the quiz status to finished */
                 $stmt = \FBLA\Database\Database::$db->prepare("UPDATE `quiz_progress` SET finished='true' WHERE quiz_id=?"); 
                 $stmt->bind_param("s", $quiz_id);
                 $stmt->execute();
                 $stmt->close();

                 redirect('reward');

            }else{
                $_SESSION['info'][] = "Please fill in all the questions.";
            }
        }

        /* Send data to the view */
        $data = [
           'questions' => $questions
        ];

        $view = new \FBLA\Views\View('questions/questions', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>