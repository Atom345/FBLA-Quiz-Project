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
        if($unfinished_quiz != false){
            $user_quiz = get_quiz_data(strval($unfinished_quiz['quiz_id']));
            $quiz_numbers = $unfinished_quiz['questions'];
            $new_quiz_id = $unfinished_quiz['quiz_id'];
            $questions = send_questions($quiz_numbers);

            $_SESSION['info'][] = "You have an unfinished quiz, please complete this one before starting a new one.";

        }else{
            if(!isset($_POST['submit_quiz'])){
            $quiz_numbers = generate_quiz_number_set();
            $user_id = \FBLA\UserData\UserData::userdata('user_id');
            $quiz_timestamp = get_time();
            $quiz_status = "false";
            $null = null;

            /* Create new quiz */
            $stmt = \FBLA\Database\Database::$db->prepare('INSERT INTO `quiz_progress` (`user_id`, `quiz_random_questions`, `given_answers`, `quiz_timestamp`, `finished`, `score`) VALUES (?,?,?,?,?,?)');
            $stmt->bind_param("ssssss", $user_id, $quiz_numbers, $null, $quiz_timestamp, $quiz_status, $null);
            $stmt->execute();
            $new_quiz_id = $stmt->insert_id;
            $stmt->close();

            /* Send the questions to the view (view/layout/questions/questions.phtml) */
            $questions = send_questions($quiz_numbers);
            }
        }

        /* If the quiz is submitted, check that the forms are filled in and check answers */
        if(isset($_POST['submit_quiz'])){

            if(isset($_POST['radio_group'], $_POST['radio_group_two'], $_POST['fill_blank'], $_POST['select'], $_POST['response'],)){
                $quiz_complete = true;

                /* Filter the values submitted */
                filter_var($_POST['radio_group'], FILTER_VALIDATE_EMAIL);
                filter_var($_POST['fill_blank'], FILTER_VALIDATE_EMAIL);
                filter_var($_POST['select'], FILTER_VALIDATE_EMAIL);

                $correct_answers = get_correct_answer_from_questions($quiz_numbers);
                $answer_one = $correct_answers[0]['correct_value'];
                $answer_two = $correct_answers[1]['correct_value'];
                $answer_three = $correct_answers[2]['correct_value'];
                $answer_four = $correct_answers[3]['correct_value'];
                $answer_five = $correct_answers[4]['correct_value'];

                /* Set the starting score and statuses */
                $score = 0;

                /* Check the answers */
                if($answer_one == $_POST['radio_group']){
                    $score++;
                    $one_status = 1;
                }else{
                  $one_status = 0;
                }

                if($answer_two == $_POST['radio_group_two']){
                    $score++;
                    $two_status = 1;
                }else{
                  $one_status = 0;
                }

                if($answer_three == $_POST['fill_blank']){
                    $score++;
                    $three_status = 1;
                }else{
                    $three_status = 0;
                }

                if($answer_four == array_sum($_POST['select'])){
                    $score++;
                    $four_status = 1;
                }else{
                    $four_status = 0;
                }

                if(get_correct_answer_response($answer_five, $_POST['response']) == true){
                    $score++;
                    $five_status = 1;
                }else{
                    $five_status = 0;
                }

                /* Assemble the question status string to determine which questions
                   were answered correctly or incorrectly later */
                $question_status = $one_status . ',' . $two_status . ',' . $three_status . ',' . $four_status . ',' . $five_status;

                $quiz_user_id = \FBLA\UserData\UserData::userdata('user_id');

                /* Save quiz and get final quiz score */
                $quiz_id = strval($new_quiz_id);
                $final_score = strval($score) . '/5';

                /* Set the quiz score */
                $stmt = \FBLA\Database\Database::$db->prepare("UPDATE `quiz_progress` SET score=? WHERE quiz_id=?");
                $stmt->bind_param("ss", $final_score, $quiz_id);
                $stmt->execute();

                /* Add question status string */
                $stmt = \FBLA\Database\Database::$db->prepare("UPDATE `quiz_progress` SET given_answers=? WHERE quiz_id=?");
                $stmt->bind_param("ss", $question_status, $quiz_id);
                $stmt->execute();

                 /* Set the quiz status to finished */
                 $stmt = \FBLA\Database\Database::$db->prepare("UPDATE `quiz_progress` SET finished='true' WHERE quiz_id=?");
                 $stmt->bind_param("s", $quiz_id);
                 $stmt->execute();
                 $stmt->close();

                 redirect('info/' . $quiz_id);

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
