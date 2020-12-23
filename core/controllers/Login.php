<?php

namespace FBLA\Controllers;

class Login extends Controller{

    public function index(){

        if(isset($_COOKIE['loggedin'])){
            redirect('dashboard');
        }

        if(isset($_POST['login'])){
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_DEFAULT);

            $query = "SELECT pass FROM users WHERE email=?";

            $stmt = \FBLA\Database\Database::$db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $fetched_user = $row;
            }
         
            if(password_verify($password, $fetched_user['pass'])){
                if(!isset($_SESSION['user_id'])){
                    $user_data = get_user_data_from_email($email);
                    $token_code = md5($user_data['user_id'] . microtime());
                    setcookie('loggedin', $token_code, time()+60*60*24*30);
                    redirect('login');
                }
            }else{
              $_SESSION['error'][] = "Please check your login details.";
            }

        }

        $view = new \FBLA\Views\View('login/login', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>