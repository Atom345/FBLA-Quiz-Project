<?php

/*

This file is responsible for making sure the user cannot jump/skip
to any quiz questions or to the quiz scoring area.

*/

namespace FBLA\Gaurd;

use FBLA\Routing\Routing;

class Gaurd {

    public function protect(){

        $quiz_urls = array(
            '1' => 'question-one',
            '2' => 'question-two',
            '3' => 'question-three',
            '4' => 'question-four',
            '5' => 'question-five',
            '6' => 'quiz-score'
        );

        if(!isset($_COOKIE['start_quiz']) and in_array(Routing::$controller_key, $quiz_urls)){
			redirect(''); // Redirect back to index page.
        }

        if(isset($_COOKIE['start_quiz'])){
        $position = array_search(Routing::$controller_key, $quiz_urls);
        
        

        }
    }

}

?>