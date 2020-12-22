<?php

namespace FBLA\Controllers;

class Register extends Controller{

    public function index(){

        $view = new \FBLA\Views\View('register/register', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>