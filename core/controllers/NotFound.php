<?php

namespace FBLA\Controllers;

class NotFound extends Controller{

    public function index(){

        $view = new \FBLA\Views\View('notfound/notfound', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>