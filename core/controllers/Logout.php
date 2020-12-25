<?php

namespace FBLA\Controllers;

class Logout extends Controller{

    public function index(){

       setcookie('loggedin', null, '-1');
       redirect('/');

    }

}

?>