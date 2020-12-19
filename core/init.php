<?php

/* Define constants for easy folder navigation */
define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');
define('APP_PATH', 'core/');
define('ASSETS_PATH', APP_PATH . 'views/assets/');
define('LAYOUT_PATH', APP_PATH . 'views/layout/');

/* Require config file for database connection */
require_once APP_PATH . 'config/config.php';

require_once APP_PATH . 'libs/Gaurd.php';

/* Require core files */
require_once APP_PATH . 'libs/App.php';
require_once APP_PATH . 'libs/Parameters.php';
require_once APP_PATH . 'libs/Controller.php';
require_once APP_PATH . 'libs/Database.php';
require_once APP_PATH . 'libs/Functions.php';
require_once APP_PATH . 'libs/Routing.php';
require_once APP_PATH . 'libs/Title.php';
require_once APP_PATH . 'libs/View.php';


?>