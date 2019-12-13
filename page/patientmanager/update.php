<?php

$conn = database::load($DB['MASTER']);
$tablename = 'patient';
$result['NAMEHEAD'] = array(
    'cid' => 'เลขบัตรปรชาชน',
    'hn' => 'hn',
    'line_token' => 'LINE TOKEN'
);


if (method::postAll() != null) {
    $condfind = "";
    foreach (method::postAll() as $value) {
        $condfind .= " AND " . $value;
    }
    $condfind = trim($condfind, " AND");
    $condfind = "AND (" . $condfind . ")";
    $result['DATA'] = crud::read($conn, $tablename, ['*'], [$condfind])[0];
    $result['NAMEPOST'] = crud::colstatus($conn, $tablename);
}

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/patientmanager/',
    'RESULT' => $result,
    'SIDEBAR' => $MENU['SIDEBAR']
);
view::renderCRUDOnLayout(array('nav', 'menu', 'crud/vupdate', 'footer'), 's001', $data);
