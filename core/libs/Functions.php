<?php

/* All functions used by the application */

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

function send_questions($payload){
    $questions_seperated = explode(",", $payload);

    $questions_array = array(
        $questions_seperated[0],
        $questions_seperated[1],
        $questions_seperated[2],
        //$questions_seperated[3]
    );

    $in    = str_repeat('?,', count($questions_array) - 1) . '?';
    $sql   = "SELECT * FROM questions WHERE question_id IN ($in)"; 
    $stmt  = FBLA\Database\Database::$db->prepare($sql);

    $types = str_repeat('s', count($questions_array));
    $stmt->bind_param($types, ...$questions_array); 

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);   
    return $data;
  
}

function generate_quiz_number_set(){

    $sql_one = "SELECT `question_id` FROM `questions` WHERE question_type='radio' order by rand() limit 1";
    $query_one = FBLA\Database\Database::$db->query($sql_one);
    while($row = $query_one->fetch_assoc()) {
        $radio_question_number = $row['question_id'];
    }

    $sql_two = "SELECT `question_id` FROM `questions` WHERE question_type='blank' order by rand() limit 1";
    $query_two = FBLA\Database\Database::$db->query($sql_two);
    while($row = $query_two->fetch_assoc()) {
        $blank_question_number = $row['question_id'];
    }

    $sql_three = "SELECT `question_id` FROM `questions` WHERE question_type='select' order by rand() limit 1";
    $query_three = FBLA\Database\Database::$db->query($sql_three);
    while($row = $query_three->fetch_assoc()) {
        $select_question_number = $row['question_id'];
    }

    $question_string = $radio_question_number . ',' . $blank_question_number . ',' . $select_question_number;

    return $question_string;

}

function master_key($action, $string) {

    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = "Cue77x81LwepWi3s";
    $secret_iv = "TfG7qrqC6ZZqhKhC";

    $key = hash('sha256', $secret_key);
    
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        if(!$output){
            return false;
        }
    }

    return $output;
}

function get_time($timezone = "MST"){
    $tz_obj = new DateTimeZone($timezone);
    $today = new DateTime("now", $tz_obj);
    $today_formatted = $today->format('m-d-y');
    
    $date = new DateTime("now", new DateTimeZone($timezone));
    return $date->format('Y-m-d H:i:s');	
    
}

function get_five_recent_completed_quizes($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `quiz_progress` WHERE user_id=? and finished='true' ORDER BY `quiz_timestamp` DESC LIMIT 5"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row;
    }
}

function get_quiz_data_from_user_id($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `quiz_progress` WHERE user_id=? ORDER BY `quiz_timestamp` LIMIT 1"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row;
    }
}

function get_recent_quiz_id_from_user_id($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `quiz_progress` WHERE user_id=? ORDER BY `quiz_timestamp` LIMIT 1"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row['quiz_id'];
    }
}

function get_most_recent_score($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `quiz_scores` WHERE user_id=? ORDER BY `score_timestamp` LIMIT 1"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row['score'];
    }
}

function count_quizes($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT COUNT(*) AS quizes FROM `quiz_progress` WHERE user_id=? and finished='true'"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $return_string = $row['quizes'];
        return strval($return_string);
    }
}

?>