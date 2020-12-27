<?php

namespace FBLA\UserData;

use FBLA\Database\Database;

class UserData {

    public static function userdata($data){
        if(isset($_COOKIE['loggedin'])){
            $get_login_session = master_key('decrypt', $_COOKIE['loggedin']);
            if($get_login_session == false){
                $_SESSION['error'][] = "Invalid cookie encryption.";
                redirect('logout');
            }else{
                $userdata = get_user_data_from_email($get_login_session);
                return $userdata[$data];
            }
        }else{
            return false;
        }
    }

}

?>