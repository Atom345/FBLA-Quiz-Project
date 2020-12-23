<?php

function notify() {
    $types = ['error', 'success', 'info'];

    foreach($types as $type) {
        if(isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
            if(!is_array($_SESSION[$type])) $_SESSION[$type] = [$_SESSION[$type]];

            foreach($_SESSION[$type] as $message) {
                $csstype = ($type == 'error') ? 'error' : $type;

                echo '
                <div class="alert alert-warning show m-2" role="alert">
                '.$message.'
                </div>
				';
            }
           unset($_SESSION[$type]);
        }
    }

}

?>