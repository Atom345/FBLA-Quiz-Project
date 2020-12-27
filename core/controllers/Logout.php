<?php

namespace FBLA\Controllers;

class Logout extends Controller{

    public function index(){

       /* Destroy the `loggedin` cookie by setting it to a negative value, and redirect to the home page */
       setcookie('loggedin', null, '-1');
       redirect('');

    }

}

?>