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


function get_correct_answer_from_questions($question_number_set){
    $answers_seperated = explode(",", $question_number_set);

    $answers_array = array(
        $answers_seperated[0], //Question One
        $answers_seperated[1], //Question Two
        $answers_seperated[2], //Question Three
        $answers_seperated[3], //Question Four 
        $answers_seperated[4] //Question Five
    );

    $in    = str_repeat('?,', count($answers_array) - 1) . '?';
    $sql   = "SELECT `correct_value` FROM questions WHERE question_id IN ($in)"; 
    $stmt  = FBLA\Database\Database::$db->prepare($sql);

    $types = str_repeat('s', count($answers_array));
    $stmt->bind_param($types, ...$answers_array); 

    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC); 
    return $data;
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
    /* Set DESC in mysql query to get latest result */
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `quiz_progress` WHERE user_id=? ORDER BY `quiz_timestamp` DESC'); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        if($row['finished'] == 'false'){
            $data_payload = array(
                'quiz_id' => $row['quiz_id'],
                'questions' => $row['quiz_random_questions']
            );
            return $data_payload;
        }else{
            return false;
        }
    }

}

function get_quiz_data($quiz_id){
    $stmt = FBLA\Database\Database::$db->prepare('SELECT * FROM `quiz_progress` WHERE quiz_id=? ORDER BY `quiz_timestamp` LIMIT 1'); 
    $stmt->bind_param("s", $quiz_id);
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

    $sql_four = "SELECT `question_id` FROM `questions` WHERE question_type='radio_two' order by rand() limit 1";
    $query_four = FBLA\Database\Database::$db->query($sql_four);
    while($row = $query_four->fetch_assoc()) {
        $radio_two_question_number = $row['question_id'];
    }

    $sql_five = "SELECT `question_id` FROM `questions` WHERE question_type='response' order by rand() limit 1";
    $query_five = FBLA\Database\Database::$db->query($sql_five);
    while($row = $query_five->fetch_assoc()) {
        $response_question_number = $row['question_id'];
    }

    $question_string = $radio_question_number.','.$blank_question_number.','.$select_question_number.','.$radio_two_question_number.','.$response_question_number;

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
    $data = $result->fetch_all(MYSQLI_ASSOC); 
    return $data;
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

function count_failed_quizes($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT COUNT(*) AS quizes FROM `quiz_progress` WHERE user_id=? and finished='true' and score='0/5'"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $return_string = $row['quizes'];
        return strval($return_string);
    }
}

function count_global_questions($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT COUNT(*) AS questions FROM `questions`");
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $return_string = $row['questions'];
        return strval($return_string);
    }
}

function get_most_recent_score($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `quiz_progress` WHERE user_id=? ORDER BY `quiz_timestamp` DESC LIMIT 1"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        return $row['score'];
    }
}

function is_admin($user_id){
    $stmt = FBLA\Database\Database::$db->prepare("SELECT * FROM `users` WHERE user_id=? LIMIT 1"); 
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        if($row['admin'] == 1){
            return true;
        }else{
            return false;
        }
    }
}

function backup_database($host,$user,$pass,$name, $tables=false, $backup_name=false)
{
    /* Set time limit and encoding then connect */
	set_time_limit(3000); FBLA\Database\Database::$db->select_db($name); FBLA\Database\Database::$db->query("SET NAMES 'utf8'");
    $queryTables = FBLA\Database\Database::$db->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }	if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); } 
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
	foreach($target_tables as $table){
		if (empty($table)){ continue; } 
		$result	= FBLA\Database\Database::$db->query('SELECT * FROM `'.$table.'`');  	$fields_amount=$result->field_count;  $rows_num=FBLA\Database\Database::$db->affected_rows; 	$res = FBLA\Database\Database::$db->query('SHOW CREATE TABLE '.$table);	$TableMLine=$res->fetch_row(); 
		$content .= "\n\n".$TableMLine[1].";\n\n";   $TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
		for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            /* Fetch all the rows */
			while($row = $result->fetch_row())	{
				if ($st_counter%100 == 0 || $st_counter == 0 )	{$content .= "\nINSERT INTO ".$table." VALUES";}
					$content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}	   if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
				if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";}	$st_counter=$st_counter+1;
			}
		} $content .="\n\n\n";
	}
	$content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;"; //Database backup headers.
	$backup_name = $backup_name ? $backup_name : $name.'___('.date('H-i-s').'_'.date('d-m-Y').').sql';
	ob_get_clean(); header('Content-Type: application/octet-stream');  header("Content-Transfer-Encoding: Binary");  header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    header("Content-disposition: attachment; filename=\"".$backup_name."\""); //Set backup name if set.
	echo $content; exit;
}

function get_correct_answer_response($answer, $post){
    if(strlen($post) >= 100){
        return true; //Fix this so it will only return true if certain keywords are in the answer.
    }else{
        return false;
    }
}

?>