<?php

$conn = database::load($DB['MASTER']);

$colUpdate = array(
    "hn = 'aaaa'",
);

$conditionUpdate = array(
    "cid ='1960500165637'"
);
echo crud::update($conn, 'patient', $colUpdate, $conditionUpdate);

