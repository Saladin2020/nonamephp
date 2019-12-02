<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

$dir = 's';
$data = array(
    'BASEURL' => $ROUTE['BASEURL'],
    'text' => ' Download',
    'link' => $ROUTE['BASEURL'] . '/download/' . $dir . '.zip'
);
view::render('popup', $data);
