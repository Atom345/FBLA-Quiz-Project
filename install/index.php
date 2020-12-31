<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');


define('ABSPATH',dirname(__FILE__).'/');
define('BASEPATH',dirname($_SERVER['PHP_SELF']));


error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if(isset($_POST['submit'])) {
    
    $db = new mysqli($_POST['db_host'], $_POST['db_user'], $_POST['db_pass'], $_POST['db_name']);
    if(mysqli_connect_error()) {
       die("There was an error trying to connect to the database, please check your connection info and try again.");
    }
	
$structure = '

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fbla_project`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_ask` text DEFAULT NULL,
  `question_content` text DEFAULT NULL,
  `question_type` varchar(20) DEFAULT NULL,
  `correct_value` text DEFAULT NULL,
  `question_hint` text DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;


INSERT INTO questions VALUES
("1","What is FBLA?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> A gaming platform<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> A program that helps students perfect their business skills for later life.<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Some random company<br />","radio","2","This is a hint."),
("2","What does FBLA stand for?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> Future Business Leaders of America<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> Free Beautiful Lovely Apples<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Future Business Leaders of Amsterdam<br />","radio","1","This is a hint."),
("3","What does FBLA focus on?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> Leadership development<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> Academic competitions<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Educational programs<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"4\" /> Membership benefits<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"5\" /> Community service<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"6\" /> Awards<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"7\" /> Recognition<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"8\" /> All of the above<br />","radio","8","This is a hint."),
("4","Who was the Founder of FBLA?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> John L. Smith<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> Hamden L. Forkner<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Seth B. Lawson<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"4\" /> Jeremy K. Gold<br />","radio","2","This is a hint."),
("5","What are FBLA\'s main colors?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> Red & Gold<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> Blue & Green<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Blue & Gold<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"4\" /> Red & Blue<br />","radio","3","This is a hint."),
("6","What are the three words across the FBLA emblem?","<input type=\"radio\" name=\"radio_group\" value=\"1\" /> Money, Cash, Awards<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"2\" /> Service, Business, Progress<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"3\" /> Service, Education, Progress<br />
\n<input type=\"radio\" name=\"radio_group\" value=\"4\" /> Business, Respect, Ownership<br />","radio","3","This is a hint."),
("7","Where is the National FBLA-PBL center located?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Berthoud, Colorado<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> Austin, Texas<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Reston, Virginia<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> San Diego, California<br />","radio_two","3","This is a hint."),
("8","What do the initials LIFT in Mission LIFT stand for?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Leading Into the Future Together<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> Life, Integrity, Future, Tomorrow<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Labs, Inkling, Forever, Today<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> Lots, Ingenious, Free, Together<br />","radio_two","1","This is a hint."),
("9","What are the dates of National FBLA-PBL week?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Second week in February<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> First Week in January<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Forth Week in May<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> Last Week in December<br />","radio_two","1","This is a hint."),
("10","What is another name for a written plan of action?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Plan of Action<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> Plan of Procedure<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Program of Work<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> Program of Execution<br />","radio_two","3","This is a hint."),
("11","What color of candle symbolizes the office of president?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Red<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> Blue<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Gold<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> Green<br />","radio_two","1","This is a hint."),
("12","How many FBLA-Middle goals are there?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> 2<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> 9<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> 10<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> 8<br />","radio_two","4","This is a hint."),
("13","Who is the FBLA-PBL President and CEO?","<input type=\"radio\" name=\"radio_group_two\" value=\"1\" /> Alexander T. Graham<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"2\" /> Jonas B. Oakes<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"3\" /> Lexi A. Smith<br />
\n<input type=\"radio\" name=\"radio_group_two\" value=\"4\" /> Jane K. Lawson<br />","radio_two","1","This is a hint."),
("14","FBLA\'s first state chapter was in  _ _ _ _","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","Iowa","This is a hint."),
("15","In debate, each member has the right to speak _ _ _ _ _ on a motion.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","twice","This is a hint."),
("16","FBLA-PBL is divided into _ _ _ _ regions.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","five","This is a hint."),
("17","_ _ _ _ _ members required to start a new chapter in FBLA-ML.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","three","This is a hint."),
("18","_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ is the official website URL for FBLA.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","www.fbla-pbl.org","This is a hint."),
("19","In order to compete in the competitive awards program for FBLA, dues must be received by _ _ _ _ _   _ .","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","March 1","This is a hint."),
("20","America Enterprise day is on _ _ _ _ _ _ _ _ _ _   _ _.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","November 10","This is a hint."),
("21","The person that typically conducts meetings has the role of _ _ _ _ _ _ _ _ _.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","president","This is a hint."),
("22","The FBLA was declared as a non-profit student organization in _ _ _ _.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","1969","This is a hint."),
("23","FBLA national dues are $_._ _","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","6.00","This is a hint."),
("24","The Parliamentary Procedure Event is named after _ _ _ _ _ _ _   _   _ _ _ _ _ _.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","Dorothy L Travis","This is a hint."),
("25","A local chapter with 50 members will be entitled to _ _ _ _ _ local voting delagates.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","three","This is a hint."),
("26","The first FBLA chapter was held in the state of _ _ _ _ _ _ _ _ _.","<input type = \"text\" name = \"fill_blank\" placeholder = \"Answer\" class = \"form-control form-control-lg\" name = \"fill_blank\">","blank","Tennessee","This is a hint."),
("27","What are FBLA\'s main colors?","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Blue</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Purple</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Green</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Gold</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Red</li>
\n</ul>","select","5","Select all that apply."),
("28","What are the different levels of FBLA?","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> FBLA Middle Level</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Professional Division</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> FBLA High Level</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> FBLA</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> PBL</li>
\n</ul>","select","12","Select all that apply."),
("29","Select the 5 Regions.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Mountain Plains</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> North Central</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Southern</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Western</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Eastern</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> All of the above</li>
\n</ul>","select","5","Select all that apply."),
("30","Select the city\'s where FLC was held.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Berthoud</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Kearney</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Austin</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Omaha</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Denver</li>
\n</ul>","select","6","Select all that apply."),
("31","Select when NLC 2016 was held.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Richmond</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Broomfield</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Nashville</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Golden</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> San Diego</li>
\n</ul>","select","3","Select all that apply."),
("32","Select the city where the first FBLA chapter was held.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Modesto</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Johnson City</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Oklahoma City</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Wichita</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Baton Rouge</li>
\n</ul>","select","2","Select all that apply."),
("33","Select the first year the Nebraska charter was held.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> 1982</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> 1962</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> 1963</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> 1998</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> 1990</li>
\n</ul>","select","3","Select all that apply."),
("34","Select the due amount required for FBLA-ML.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> $4.00</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> $6.00</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Four Dollars</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> $5.00</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Six Dollars</li>
\n</ul>","select","4","Select all that apply."),
("35","Select all the available business achievement awards.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Future Award</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Business Award</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\" >Leader Award</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> America Award</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> All the above</li>
\n</ul>","select","5","Select all that apply."),
("36","Select all the categories in FBLA competitive events.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Team</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Individual</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Plan</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Process</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Chapter</li>
\n</ul>","select","8","Select all that apply."),
("37","Select the national theme for FBLA-PBL in 2014-2015.","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> Step up to the challenge</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> Step up to the Adventure</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> Promote Business</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> Create a Plan</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> Step up to the awards</li>
\n</ul>","select","1","Select all that apply."),
("38","How many members are on the National Board of directors?","<ul class=\"select\">
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"1\"> 16</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"2\"> 8</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"3\"> 15</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"4\"> 20</li>
\n    <li><input type=\"checkbox\" name=\"select[]\" value=\"5\"> 10</li>
\n</ul>","select","3","Select all that apply."),
("39","When presenting your FBLA project, it is important to be...","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","professional,respectful","This is a free response. Free responses should be more than 100 letters."),
("40","In your own words, what does FBLA focus on?","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","business,hard work,success,learning","This is a free response. Free responses should be more than 100 letters."),
("41","When working on a project for a competitive event, it is important to...","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","guidelines,rules ","This is a free response. Free responses should be more than 100 letters."),
("42","When participating at a FBLA event, it is important to dress...","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","appropriately,nicely,professionally","This is a free response. Free responses should be more than 100 letters."),
("43","When participating in a FBLA related event, it is important not to...","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","disrespectful,rude,loud","This is a free response. Free responses should be more than 100 letters."),
("44","Give some examples of clothing you should wear to an FBLA event.","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","suit,slacks,nice shoes,jeans,tie","This is a free response. Free responses should be more than 100 letters."),
("45","How do FBLA competitive events work?","<textarea class=\"form-control form-control-alternative\" name = \"response\" rows=\"5\" placeholder=\"Your Response\"></textarea>
\n</form>","response","guidelines,rules,present,presentation,judges","This is a free response. Free responses should be more than 100 letters.");




CREATE TABLE `quiz_progress` (
  `quiz_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `quiz_random_questions` varchar(50) DEFAULT NULL,
  `quiz_timestamp` varchar(40) DEFAULT NULL,
  `finished` varchar(10) DEFAULT NULL,
  `score` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`quiz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `pass` varchar(225) DEFAULT NULL,
  `admin` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

';

 $db->multi_query($structure) or die("An error has occured when trying to add database tables.");
    do{} while(mysqli_more_results($db) && mysqli_next_result($db));
    
 $db->query('INSERT INTO `users` VALUES ("1","admin@admin.com","John Smith","$2y$10$4qDsbSkqaDtqYSaC/db7Cui/yG8AFY3sKfl3SBbkTKCTTQSFYZ7UG","1")');   

$config_string = '<?php

/*

This is the config file. Its job is to store
the deatils required to connect to the database.
Database connnection can be seen in ../libs/Database.php

*/

define("DB_HOST", "' . $_POST['db_host'] . '");
define("DB_USER", "' . $_POST['db_user'] . '");
define("DB_PASS", "' . $_POST['db_pass'] . '");
define("DB_NAME", "' . $_POST['db_name'] . '");
define("DB_PORT", 3306);
define("SITE_URL", "' . $_POST['site_url'] . '");

/* Error reporting for database and PHP */
define("SHOW_ERRORS", true);

?>
';
	
    $config_file =  '../core/config/config.php';
    $handle = fopen($config_file, 'w') or die("Installer failed to create the config file.");
    fwrite($handle, $config_string);
    fclose($handle);
    
	header("Location: ../");

}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>FBLA Quiz Installation</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel='stylesheet' href='../core/views/assets/css/argon-design-system.css'>
</head>

<body>
<div class = "container">
    <form action = "index.php" method = "post">
        <div class = "row">
            <div class = "col-md-8 offset-2">
                <div class = "card m-3">
                <div class = "card-header">
                    <div class = "card-title"><h4>Installation Wizard</h4></div>
                </div>
                    <div class = "card-body">
                    <p>Fill in your database details to install FBLA Quiz on your machine.</p>
                    <div class = "form-group">
                        <input class = "form-control" type = "text" placeholder = "Database Host" name = "db_host">
                        <br>
                        <input class = "form-control" type = "text" placeholder = "Database User" name = "db_user">
                        <br>
                        <input class = "form-control" type = "password" placeholder = "Database Password" name = "db_pass">
                        <br>
                        <input class = "form-control" type = "text" placeholder = "Database Name" name = "db_name">
                        <br>
                        <input class = "form-control" type = "text" placeholder = "Site URL" name = "site_url">
                        <small class = "text-muted">Please be sure to add '\' at the end of your URL.</small>
                    </div>
                    <button class = "btn btn-primary" type = "submit" name = "submit">Install</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
