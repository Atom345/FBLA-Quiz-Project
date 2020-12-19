<?php

/* 

This is the View controller. Its job is to fetch the PHTML files
based on the current controller key.

*/

namespace FBLA\Views; //Set Namespce

use FBLA\Traits\Paramsable;

class View {
    use Paramsable;

    public $view;
    public $view_path;


    /*

    Constructor to use when creating a new instance of the View class.

    The Veiw class is used in all contoller files. Example below.



    $view = new \FBLA\Views\View('index/index', (array) $this);

    $this->addViewContent('content', $view->run());

    */

    public function __construct($view, Array $params = []) {

        $this->view = $view;
        $this->view_path = APP_PATH . 'views/layout/' . $view . '.phtml';
        $this->add_params($params);

    }

    /*

    Gets the value of $data, stores and outputs content.

    */
    public function run($data = []) {

        $data = (object) $data;

        ob_start();

        require $this->view_path;
        return ob_get_clean();
    }

}
