<?php

$conn = database::load($DB['MASTER']);
$data = array(
    'cid' => '1960500165635',
    'hn' => '2019-12-10',
    'line_token' => 'hello12358'
);
echo crud::create($conn, 'patient', $data);