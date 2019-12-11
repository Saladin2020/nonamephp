<?php

$conn = database::load($DB['MASTER']);
if (method::postAll() != null) {
    $condition = "";
    foreach (method::postAll() as $value) {
        $condition .= " AND " . $value;
    }
    $condition = trim($condition, " AND");
    echo crud::delete($conn, 'patient', $condition);
}
redirect::page($ROUTE['BASEURL'], 'patientmanager/read');


