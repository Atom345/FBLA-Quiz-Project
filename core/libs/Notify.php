<?php

/* 

This is the notification file. Its job is to display
critical information, such as errors and warnings. 

*/

function notify() {
    $types = ['error', 'success', 'info']; //Types of notification messages.

    foreach($types as $type) {
        if(isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
            if(!is_array($_SESSION[$type])) $_SESSION[$type] = [$_SESSION[$type]];

            foreach($_SESSION[$type] as $message) {
                $csstype = ($type == 'error') ? 'error' : $type;

                /* Output a Bootstrap alert. */
                echo '
                <div class="alert alert-danger show m-2" role="alert">
                '.$message.'
                </div>
				';
            }
           unset($_SESSION[$type]); //Unset the notification message, so it does not show up again.
        }
    }

}

?>