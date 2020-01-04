<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

$projectfolder = 'patientmanager';
$conn = database::load($DB['MASTER']);
builderCRUD::DELETE(
        $projectfolder,
        $conn,
        $ROUTE
);
