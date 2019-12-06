<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class redirect {

    public static function page($baseurl, $page) {
        header('location:' . $baseurl . '/index.php/' . $page);
    }

    public static function extanal($url) {
        header('location:' . $url);
    }

}
