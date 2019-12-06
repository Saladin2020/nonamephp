<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class session {

    public static function load() {
        return new session();
    }

    public function __construct() {
        session_start();
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : '';
    }

    public function clear_value() {
        session_unset();
    }

    public function clear_all() {
        session_destroy();
    }

}
