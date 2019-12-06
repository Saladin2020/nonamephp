<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => '$result',
    'SIDEBAR' => $MENU['SIDEBAR']
);
view::renderOnLayout(array('nav', 'menu', 'home', 'footer'), 's001', $data);
