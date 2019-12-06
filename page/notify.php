<?php

$result = array();
$result['LINE_REDIRECT_URI'] = $ROUTE['LINE_REDIRECT_URI'];
$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => $result
);
view::renderOnLayout(array('notify', 'footer'), 's002', $data);
