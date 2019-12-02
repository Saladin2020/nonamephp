<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */
date_default_timezone_set("Asia/Bangkok");
require './core/loader.php';
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if (count($uriSegments) >= 4) {
    $page = './page/' . $uriSegments[3] . '.php';
    if (file_exists($page)) {
        require $page;
    } else {
        echo 'No Page';
    }
} else {
    header('location:' . $ROUTE['BASEURL'] . $ROUTE['HOME']);
}
