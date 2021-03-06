<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

//prepare
$projectfolder = 'patientmanager';
$conn = database::load($DB['MASTER']);
$tablename = 'patient';
$rowFetch = 25;

$result['COLHEAD'] = array(
    'เลขบัตรปรชาชน',
    'hn',
    'LINE TOKEN'
);

builderCRUD::READ(
        $projectfolder,
        $conn,
        $tablename,
        $rowFetch,
        $result,
        $ROUTE,
        $MENU
);
