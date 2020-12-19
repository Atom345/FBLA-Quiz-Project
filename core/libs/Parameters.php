<?php

namespace FBLA\Traits;

trait Paramsable{

public function add_params(Array $params = []){

    foreach($params as $key => $value){

        $this->{$key} = $value;

    }

}

}

?>