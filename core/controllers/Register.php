<?php

namespace FBLA\Controllers;

class Register extends Controller{

    public function index(){

        if(isset($_COOKIE['loggedin'])){
            redirect('dashboard');
        }

        if(isset($_POST['register'])){
            if(isset($_POST['email'], $_POST['name'], $_POST['password'], $_POST['repeat-password'])){
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $name = filter_var($_POST['name'], FILTER_DEFAULT);
            $password = filter_var($_POST['password'], FILTER_DEFAULT);
            $repeat_password = filter_var($_POST['repeat-password'], FILTER_DEFAULT);

            if(strlen($name) > 32){
                $_SESSION['error'][] = "Name must be under 32 characters.";
            }

            if($password !== $repeat_password){
                $_SESSION['error'][] = "Your provided passwords do not match.";
            }

            $hashed_password = password_hash($repeat_password, PASSWORD_DEFAULT);
            $stmt = \FBLA\Database\Database::$db->prepare('INSERT INTO users (`email`, `name`, `pass`) VALUES (?, ?, ?)'); 
            $stmt->bind_param("sss", $email, $name, $hashed_password);
            $stmt->execute();
            $stmt->close();

            $token_code = master_key('encrypt', $email);
            setcookie('loggedin', $token_code, time()+60*60*24*30);
            redirect('dashboard');
        }else{
            $_SESSION['error'][] = "Please fill in all fields!";
        }

        }
        
        $view = new \FBLA\Views\View('register/register', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>