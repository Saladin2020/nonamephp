<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

$projectfolder = 'patientmanager';
$conn = database::load($DB['MASTER']);
$tablename = 'patient';
$result['NAMEHEAD'] = array(
    'cid' => 'เลขบัตรปรชาชน',
    'hn' => 'hn',
    'line_token' => 'LINE TOKEN'
);

builderCRUD::CREATE(
        $projectfolder,
        $conn,
        $tablename,
        $result,
        $ROUTE,
        $MENU
);
