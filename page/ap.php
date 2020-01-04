<?php

$sess = session::load();
if ($sess->get('ALLOW') !== "PASS") {
    redirect::page($ROUTE['BASEURL'], 'login');
}

$hncid = method::post('hncid');
$result = array();
if ($hncid !== "") {
    $conn = database::load($DB['MASTER']);
    $sql_statement = "SELECT *"
            . " FROM patient"
            . " WHERE 1"
            . " AND cid='" . $hncid . "'"
            . " OR hn='" . $hncid . "'";
    $q = $conn->query($sql_statement, 'NAME');
    if ($q != null) {
        $conn_hosxp = database::load($DB['HOSxP']);
        $sql_hosxp = "SELECT * FROM patient WHERE 1 AND cid='" . $q[0]['cid'] . "'";
        $q_hosxp = $conn_hosxp->query($sql_hosxp, 'NAME');
        if (count($q_hosxp) > 0) {
            $result['CID'] = $q_hosxp[0]['cid'];
            $result['HN'] = $q_hosxp[0]['hn'];
            $result['FNAME'] = $q_hosxp[0]['fname'];
            $result['LNAME'] = $q_hosxp[0]['lname'];
            $result['SEX'] = $q_hosxp[0]['sex'];
            $result['BDATE'] = $q_hosxp[0]['birthday'];
        }
    } else {
        $result['NOTFOUND'] = 'NOT FOUND';
    }
}

$cid_number = method::post('cid_number');
$hn_number = method::post('hn_number');
$fname = method::post('fname');
$lname = method::post('lname');
$sex = method::post('sex');
$age = method::post('age');
$apdate = method::post('apdate');
$aptime = method::post('aptime');
$order = method::post('order');
$note = method::post('note');
if ($cid_number !== "" && $hn_number !== "" && $fname !== "" && $lname !== "" && $sex !== "" && $age !== "" && $apdate !== "" && $aptime !== "" && $order !== "" && $note !== "") {

    
}


    $data = array(
        'TITLE' => 'yNotification',
        'BASEURL' => $ROUTE['BASEURL'],
        'HEADERNAME' => 'yNotification',
        'RESULT' => $result,
        'SIDEBAR' => $MENU['SIDEBAR']
    );
    view::renderOnLayout(array('nav', 'menu', 'ap', 'footer'), 's001', $data);
    