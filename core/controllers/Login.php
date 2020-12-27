<?php

namespace FBLA\Controllers;

class Login extends Controller{

    public function index(){

        /* Check if user is logged in */
        if(isset($_COOKIE['loggedin'])){
            redirect('dashboard');
        }

        /* If the login form has been submitted, continue the actions */
        if(isset($_POST['login'])){
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); //Filter the provided email.
            $password = filter_var($_POST['password'], FILTER_DEFAULT); //Filter the provided password.

            /* Check user password based on provided email */
            $query = "SELECT pass FROM users WHERE email=?";

            $stmt = \FBLA\Database\Database::$db->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()){
                $fetched_user = $row; 
            }
         
            /* Verify the given password */
            if(password_verify($password, $fetched_user['pass'])){
                /* If the `loggedin` cookie is not set, create the cookie with the encrypted users email */
                if(!isset($_SESSION['user_id'])){
                    $user_data = get_user_data_from_email($email);
                    $token_code = master_key('encrypt', $user_data['email']);
                    setcookie('loggedin', $token_code, time()+60*60*24*30);
                    redirect('login');
                }
            }else{
              $_SESSION['error'][] = "Please check your login details."; //If the login details are not correct.
            }

        }

        $view = new \FBLA\Views\View('login/login', (array) $this);

        $this->addViewContent('content', $view->run());

    }

}

?>