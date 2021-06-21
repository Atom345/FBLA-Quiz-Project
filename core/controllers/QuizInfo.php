<?php

namespace FBLA\Controllers;

class QuizInfo extends Controller{

    public function index(){

        /* Check if quiz ID is a parameter passed in the URL */
        if(isset($this->params[0]) and quiz_exists($this->params[0]) == true){
          $quiz_id = filter_var($this->params[0], FILTER_SANITIZE_STRING);

          /* Prepare to send payload(s) to the view */
          $questions_asked = array();
          $question_status = array();

          /* Get some basic data and assign to variables */
          $quiz = get_quiz_data($quiz_id);
          $status = $quiz["given_answers"];
          $quiz_questions = $quiz["quiz_random_questions"];
          $quiz_completed = $quiz["quiz_timestamp"];
          $quiz_id = $quiz["quiz_id"];
          $quiz_score = $quiz["score"];

          /* Loop through the returned data and store question ask in array */
          foreach(explode(",", $quiz_questions) as $question){
             $data_raw = get_question_data_from_id($question);
             array_push($questions_asked, $data_raw["question_ask"]);
          }

          /* Loop through the returned data and store question status in array */
          foreach(explode(",", $status) as $s){
             array_push($question_status, $s);
          }

          /* Merge the two data payloads */
          $question_data = array_combine($questions_asked, $question_status);

        }else{
          redirect('');
        }

        $data = [
           'question_data' => $question_data,
           'quiz_time' => $quiz_completed,
           'quiz_score' => $quiz_score
        ];

        $view = new \FBLA\Views\View('info/info', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>
