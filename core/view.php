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

    public static function renderOnLayout($views, $layout, $var = '') {
        $section = array();
        $i = 0;
        foreach ($views as $view) {
            ob_start();
            require_once 'view/view_' . $view . '.php';
            $section[$i] = ob_get_contents();
            ob_clean();
            $i++;
        }
        require_once 'view/layout/' . $layout . '.php';
    }

}
