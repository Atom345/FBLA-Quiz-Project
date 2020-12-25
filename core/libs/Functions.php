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

function get_user_data_from_email($user_email){
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `users` WHERE email=?');
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()){
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

function get_user_data($id){

}

function is_logged_in(){
    if(isset($_COOKIE['loggedin'])){
        return true;
    }else{
        return false;
    }
}

function user_has_unfinished_quiz($user_id){
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `quiz_progress` WHERE user_id=? LIMIT 1'); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
 
        if($row['finished'] == 'false'){
            return true;
        }else{
            return false;
        }
    }

}

function get_user_quiz_data($user_id){
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `quiz_progress` WHERE user_id=? LIMIT 1'); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row;
    }
}

function generate_questions($payload){
    $questions_seperated = explode(",", $payload);

    $radio_sql = FBLA\Database\Database::$db->query('SELECT * FROM `questions` WHERE question_id="'. $questions_seperated[0] .'" order by RAND() LIMIT 1');

    while($radio_row = $radio_sql->fetch_assoc()) {
      $radio_payload = $radio_row;
    }

    $blank_sql = FBLA\Database\Database::$db->query('SELECT * FROM `questions` WHERE question_id="'. $questions_seperated[1] .'" order by RAND() LIMIT 1');

    while($blank_row = $blank_sql->fetch_assoc()) {
      $blank_payload = $blank_row;
    }

    $questions_json_payload = array(
        'radio' => $radio_payload,
        'blank' => $blank_payload
    );

    return $questions_json_payload;


   
}

?>