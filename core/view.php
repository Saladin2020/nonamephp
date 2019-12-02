<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class view {

    public static function render($view, $var = '') {
        require_once 'view/view_' . $view . '.php';
    }

    public static function render2($view, $var = '') {
        require 'view/view_' . $view . '.php';
    }

}
