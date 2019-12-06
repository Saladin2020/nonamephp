<?php

$sess = session::load();
$result = array();
if ($sess->get('LINE_NOTIFY_COMPLTE') === "") {
    redirect::page($ROUTE['BASEURL'], 'welcome');
}
if (method::post('endjob') === 'yConcept') {
    $sess->clear_value();
    $sess->clear_all();
    redirect::page($ROUTE['BASEURL'], 'welcome');
}

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => $result
);
view::renderOnLayout(array('success', 'footer'), 's002', $data);
