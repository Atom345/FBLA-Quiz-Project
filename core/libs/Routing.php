<?php

/* 

This is the router. Its job is to specify the Controller class for each 
key based on the URL path. If $controller_key == 'index' then it loads the `Index` Controller
class.

*/

namespace FBLA\Routing; //Set the namespace

class Routing {

    /* 

    Specify the container file (views/layout/container.phtml)
    This file will be responsible for loading all CSS and JavaScript needed.

    */

    public static $params = []; 
    public static $path = ''; //Default path before load
    public static $controller_key = 'index'; //Default controller key
    public static $controller = 'Index'; //Idex controller class

    public static $controller_settings = [

        'container' => 'container'

    ];
    public static $method = 'index';

    public static $routes = [

        '' => [
		
            'index' => [ //Index contoller key
                'controller' => 'Index' //Index controller class
            ],

            'notfound' => [ //NotFound contoller key
                'controller' => 'NotFound'  //NotFound controller class
            ],

            'questions' => [
                'controller' => 'Questions'
            ],

            'reward' => [
                'controller' => 'Reward'
            ],

            'login' => [
                'controller' => 'Login'
            ],

            'register' => [
                'controller' => 'Register'
            ],

            'logout' => [
                'controller' => 'Logout'
            ],

            'dashboard' => [
                'controller' => 'Dashboard'
            ],

        ]
    ];


    /*

    Look at the path after the domain to see what contoller to load using `$_GET['FBLA']`

    https://example.com/login 

    In the example above, login would be the controller key, and the ccontroller class `Login` would
    be created. 

    */
    public static function parse_url() {

        $params = self::$params;

        if(isset($_GET['FBLA'])) {
            $params = explode('/', filter_var(rtrim($_GET['FBLA'], '/'), FILTER_SANITIZE_URL));
        }

        self::$params = $params;

        return $params;

    }

    /*

    Gets the values from the array $params and returns them as array values.

    */
    public static function get_params() {

        return self::$params = array_values(self::$params);
    }

    public static function parse_controller() {

        /* Check for potential other paths than the default one (admin panel) */
        if(!empty(self::$params[0])) {

            if (in_array(self::$params[0], ['admin'])) {
                self::$path = self::$params[0];

                unset(self::$params[0]);

                self::$params = array_values(self::$params);
            }

        }

        if(!empty(self::$params[0])) {

            if(array_key_exists(self::$params[0], self::$routes[self::$path]) && file_exists(APP_PATH . 'controllers/' . (self::$path != '' ? self::$path . '/' : null) . self::$routes[self::$path][self::$params[0]]['controller'] . '.php')) {

                self::$controller_key = self::$params[0];

                unset(self::$params[0]);

            } else {

                /* Not found controller */
                self::$path = '';
                self::$controller_key = 'notfound';

            }

        }

        /* Save the current controller */
        self::$controller = self::$routes[self::$path][self::$controller_key]['controller'];

        /* Make sure we also save the controller specific settings */
        if(isset(self::$routes[self::$path][self::$controller_key]['settings'])){
            self::$controller_settings = array_merge(self::$controller_settings, self::$routes[self::$path][self::$controller_key]['settings']);
        }

        return self::$controller;

    }

    public static function get_controller($controller_name, $path = '') {

        require_once APP_PATH . 'controllers/' . ($path != '' ? $path . '/' : null) . $controller_name . '.php';

        /* Create a new instance of the controller */
        $class = 'FBLA\\Controllers\\' . $controller_name;

        /* Instantiate the controller class */
        $controller = new $class;

        return $controller;
    }

    public static function parse_method($controller) {

        $method = self::$method;

        /* Make sure to check the class method if set in the url */
        if(isset(self::get_params()[0]) && method_exists($controller, self::get_params()[0])) {

            /* Make sure the method is not private */
            $reflection = new \ReflectionMethod($controller, self::get_params()[0]);
            if($reflection->isPublic()) {
                $method = self::get_params()[0];

                unset(self::$params[0]);
            }

        }

        return $method;

    }

}
