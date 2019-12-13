<?php

$conn = database::load($DB['MASTER']);
$tablename = 'patient';

if (method::postAll() != null) {
    $setpost = array();
    $wherepost = "";
    $keyset = array();
    foreach (crud::colstatus($conn, $tablename) as $keypri) {
        if ($keypri['Key'] === 'PRI') {
            $keyset[$keypri['Field']] = $keypri['Field'];
        }
    }
    $ii = 0;
    foreach (method::postAllOrigin() as $key => $value) {
        if (isset($keyset[$key]) !== $key) {
            $setpost[$ii] = $key . "='" . $value . "'";
            $ii++;
        } else {
            $wherepost .= "AND " . $key . "='" . $value . "' ";
        }
    }
    $wherepost = trim($wherepost, "AND");
    crud::update($conn, $tablename, $setpost, [$wherepost]);
    redirect::page($ROUTE['BASEURL'], 'patientmanager/read');
}
