<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */
date_default_timezone_set("Asia/Bangkok");
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);

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
    redirect::page($ROUTE['BASEURL'], $ROUTE['HOME']);
}
