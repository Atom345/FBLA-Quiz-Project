<?php

function get_random_question_type($question_type){

    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `questions` WHERE question_type=? order by RAND() LIMIT 1'); 
    $stmt->bind_param("s", $question_type);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row;
    }

}

function get_correct_answer_from_question($question_id){
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `questions` WHERE question_id=? LIMIT 1'); 
    $stmt->bind_param("s", $question_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row['correct_value'];
    }
}

function back_up_database(){

}

function redirect($path){
    header("Location:" . SITE_URL . $path);
}

function url($path){
    $url = SITE_URL . $path;
    return $url;
}

?>