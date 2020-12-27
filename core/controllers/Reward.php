<?php

namespace FBLA\Controllers;

use \FBLA\UserData\UserData;

class Reward extends Controller{

    public function index(){

        $view = new \FBLA\Views\View('reward/reward', (array) $this);

        $this->addViewContent('content', $view->run($data));

    }

}

?>