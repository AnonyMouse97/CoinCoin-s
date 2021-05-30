<?php

class Sanitize{
    function sanitize($var){
        
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }
}