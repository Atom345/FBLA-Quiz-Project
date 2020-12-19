<?php

namespace FBLA\Controllers;

class Index extends Controller{

    public function index(){

        $view = new \FBLA\Views\View('index/index', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>