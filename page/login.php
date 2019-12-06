<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

$sess = session::load();
if ($sess->get('ALLOW') === "PASS") {
    redirect::page($ROUTE['BASEURL'], 'home');
}
if ($sess->get('TOKEN') === "") {
    $sess->set('TOKEN', $TOKEN['LOGIN']);
}

$user = method::post('username');
$pass = method::post('password');
$token = method::post('token');
$result = '';

if ($user != '' && $pass != '' && $sess->get('TOKEN') === $token) {

    $conn = database::load($DB['MASTER']);

    $sql_statement = "SELECT *"
            . " FROM user"
            . " WHERE 1"
            . " AND username='" . $user . "'"
            . " AND pass='" . md5($pass) . "'";
    $q = $conn->query($sql_statement, 'NAME');
    if (count($q) > 0) {
        $sess->set('ALLOW', 'PASS');
        $sess->set('USERNAME', $q [0]['username']);
        $sess->set('FNAME', $q [0]['fname']);
        $sess->set('LNAME', $q [0]['lname']);
        redirect::page($ROUTE['BASEURL'], 'home');
    } else {
        $result = "USERNAME/PASSWORD INCORRECT";
    }
}

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'TOKEN' => $sess->get('TOKEN'),
    'RESULT' => $result
);

view::renderOnLayout(array('login'), 's001', $data);
