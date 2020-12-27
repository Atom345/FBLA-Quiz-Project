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
        $questions_seperated[3],
        $questions_seperated[4]
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
    $numbers = range(1, 50);
    shuffle($numbers);
    $return_numbers = $numbers[0].','.$numbers[1].','.$numbers['2'].','.$numbers[3].','.$numbers[4];
    return $return_numbers;
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

?>