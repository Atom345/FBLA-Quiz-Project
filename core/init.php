<?php

/* Define constants for easy folder navigation */
define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');
define('APP_PATH', 'core/');
define('ASSETS_PATH', APP_PATH . 'views/assets/');
define('LAYOUT_PATH', APP_PATH . 'views/layout/');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* Require config file for database connection */
if(file_exists(APP_PATH . 'config/config.php')){
    require_once APP_PATH . 'config/config.php';
}else{
    header("Location: ../install/index.php");
}

ini_set('error_log', ROOT_PATH . 'errors.txt');

define('COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', SITE_URL));
session_set_cookie_params(null, COOKIE_PATH);
session_start();

/* Require core files */
require_once APP_PATH . 'libs/App.php';
require_once APP_PATH . 'libs/Parameters.php';
require_once APP_PATH . 'libs/Controller.php';
require_once APP_PATH . 'libs/Database.php';
require_once APP_PATH . 'libs/Functions.php';
require_once APP_PATH . 'libs/Routing.php';
require_once APP_PATH . 'libs/Title.php';
require_once APP_PATH . 'libs/UserData.php';
require_once APP_PATH . 'libs/View.php';

require_once APP_PATH . 'libs/Notify.php';

?>