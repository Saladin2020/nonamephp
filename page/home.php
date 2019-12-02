<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);
$url = method::post('url');

$data = array(
    'TITLE' => 'cURL testing',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME'=> 'cURL testing'
);
view::render('home', $data);
