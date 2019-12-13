<?php

$conn = database::load($DB['MASTER']);
$tablename = 'patient';
$result['NAMEHEAD'] = array(
    'cid' => 'เลขบัตรปรชาชน',
    'hn' => 'hn',
    'line_token' => 'LINE TOKEN'
);


$result['NAMEPOST'] = crud::colstatus($conn, $tablename);
if (method::postAllOrigin() != null) {
    $namepost = array();
    foreach (method::postAllOrigin() as $key => $value) {
        $namepost[$key] = $value;
    }
    $result['STATUSINSERT'] = crud::create($conn, $tablename, $namepost);
}




$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/patientmanager/',
    'RESULT' => $result,
    'SIDEBAR' => $MENU['SIDEBAR']
);
view::renderCRUDOnLayout(array('nav', 'menu', 'crud/vcreate', 'footer'), 's001', $data);
