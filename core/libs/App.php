<?php

/* 

This is the application core. Its job is to create instances of all
the included classes in order to run. All classes that are needed can 
be found in `app/init.php`

*/

namespace FBLA; //Set the namespace.

use \FBLA\Routing\Routing; //Use the Routing class.
	
class App{

	protected $db; //Protect the database varible.

    public function __construct() {
		
		/* Check the URL paramters (https://example.com/login) */
		Routing::parse_url();

		/* Handle the controller */
		Routing::parse_controller();

		Gaurd\Gaurd::protect();
		
		/* Get the correct controller based on URL/method */
		$controller = Routing::get_controller(Routing::$controller, Routing::$path);

		/* Parse the method (https://example.com/login) where `login` is the method */
		$method = Routing::parse_method($controller);

		$params = Routing::get_params();

		/* Set the tab title */
		Title::start('FBLA Quiz');

		 /* Start and connect to the database */
        $this->db = Database\Database::start();
		
		/* Add main varible to contoller so it can be accessed by all controllers */
		$controller->add_params([
			'database' => $this->db,
			'params' => $params
		]);

		/* Call the controller method */
        call_user_func_array([ $controller, $method ], []);
		
		/* Ouput and display */
		$controller->run();

	}
	
}

?>