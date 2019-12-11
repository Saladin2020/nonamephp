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

    public static function postAll() {
        $arr = array();
        $i = 0;
        foreach ($_POST as $key => $value) {
            if ($value != '') {
                $arr[$i] = $key . "='" . $value . "'";
                $i++;
            }
        }
        //print_r($arr);
        return $arr;
    }

    public static function getAll() {
        print_r($_GET);
    }

}
