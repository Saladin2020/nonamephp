<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class method {

    public static function post($name) {
        return (isset($_POST[$name]) != '') ? $_POST[$name] : '';
    }
    
    public static function get($name) {
        return (isset($_GET[$name]) != '') ? $_GET[$name] : '';
    }

}
