<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

$sess = session::load();
$sess->clear_value();
$sess->clear_all();
redirect::page($ROUTE['BASEURL'], $ROUTE['HOME']);

