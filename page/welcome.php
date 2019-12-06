<?php

$sess = session::load();
$sess->clear_value();
$sess->clear_all();

$result = array();

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'บริการ',
    'RESULT' => $result
);
view::renderOnLayout(array('welcome', 'footer'), 's002', $data);
