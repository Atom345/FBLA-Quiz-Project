<?php

namespace FBLA\Controllers;

class Login extends Controller{

    public function index(){

        $view = new \FBLA\Views\View('login/login', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>