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



 $db->multi_query(file_get_contents('fbla.sql')) or die("An error has occured when trying to add database tables.");
    do{} while(mysqli_more_results($db) && mysqli_next_result($db));

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

/* How fast a form can be filled out in seconds before the client is marked as a bot. */
define("SPAM_BOT_SEC", 1);

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
    <link rel='stylesheet' href='../core/views/assets/css/style.css'>
    <script src = "../core/views/assets/js/script.js"></script>
</head>

<body>
<div class = "container">
    <form action = "index.php" method = "post">
        <div class = "row">
          <div class="card">
              <div class="card-content">
                  <span class="card-title">Installation Wizard</span>
                    <br>
                    <div class="input-field">
                      <input id="db_host" placeholder = "localhost" type="text" value = "localhost" name = "db_host" class="validate">
                      <label for="db_host">Database Hostname</label>
                      <p>Your database hostname. Typically 'localhost'.</p>
                    </div>
                    <br>
                    <div class="input-field">
                      <input id="db_user" placeholder = "johnTheUser" type="text" name = "db_user" class="validate">
                      <label for="db_user">Database Username</label>
                      <p>The username needed to access your database.</p>
                    </div>
                    <br>
                    <div class="input-field">
                      <input id="db_pass" placeholder = "123456b$" type="text" name = "db_pass" class="validate">
                      <label for="db_pass">Database Password</label>
                      <p>The password used for your database.</p>
                    </div>
                    <br>
                    <div class="input-field">
                      <input id="db_name" placeholder = "my_cool_db_name" type="text" name = "db_name" class="validate">
                      <label for="db_name">Database Name</label>
                      <p>Your database name. Case sensitive.</p>
                    </div>
                    <br>
                    <div class="input-field">
                      <input id="site_url" placeholder = "https://example.com/" type="text" name = "site_url" class="validate">
                      <label for="site_url">Website URL</label>
                      <p>The URL that you are installing the application on. Please be sure to add '\' at the end of your URL.</p>
                    </div>
                  </div>

                  <div class="card-action">
                    <button type = "submit" class = "btn blue" name = "submit">Install</button>
                  </div>
                </div>
            </form>
        </div>
    </body>
</html>
