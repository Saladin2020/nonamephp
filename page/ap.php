<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

$hncid = method::post('hncid');
$result = array();
if ($hncid !== "") {
    $conn = database::load($DB['MASTER']);

    $sql_statement = "SELECT *"
            . " FROM patient"
            . " WHERE 1"
            . " AND cid='" . $hncid . "'"
            . " OR hn='" . $hncid . "'";
    $q = $conn->query($sql_statement, 'NAME');
    if ($q != null) {
        $result['FNAME'] = $q[0]['fname'];
        $result['LNAME'] = $q[0]['lname'];
        $result['LINETOKEN'] = $q[0]['line_token'];
    } else {
        $result['NOTFOUND'] = 'NOT FOUND';
    }
}



$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => $result,
    'SIDEBAR' => $MENU['SIDEBAR']
);
view::renderOnLayout(array('nav', 'menu', 'ap', 'footer'), 's001', $data);
