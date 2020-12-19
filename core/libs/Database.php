<?php

/*

This controls the connection to the application database. Its
job is to connect to the database using the constants defined 
in `core/config/config.php`

*/

namespace FBLA\Database;

class Database {

	/* Set the databse varible */
    public static $db;

	/* Provide a function to connect to database */
    public static function start() {

        self::$db = new \mysqli(
            DB_HOST, //Database Host
            DB_USER, //Database User
            DB_PASS, //Database Pass
            DB_NAME //Database Name
        );
	}
	
}

?>