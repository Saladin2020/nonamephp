<?php

$cid = method::post('cid');
$code = method::get('code');
$state = method::get('state');
$result = array();

$sess = session::load();
if ($sess->get('LINE_CODE') === "" && $sess->get('LINE_STATE') === "") {
    if ($code === '' && $state === '') {
        redirect::page($ROUTE['BASEURL'], 'welcome');
    } else {
        $sess->set('LINE_CODE', $code);
        $sess->set('LINE_STATE', $state);
        //$result['CODE'] = $sess->get('LINE_CODE', $code);
        //$result['STATE'] = $sess->get('LINE_STATE', $state);
        //echo '1';
    }
} else {
    if ($code === '' && $state === '') {
        //echo '2';
        //$result['CODE'] = $sess->get('LINE_CODE', $code);
        // $result['STATE'] = $sess->get('LINE_STATE', $state);
    } else {
        //echo '3';
        $sess->set('LINE_CODE', $code);
        $sess->set('LINE_STATE', $state);
        // $result['CODE'] = $sess->get('LINE_CODE', $code);
        //$result['STATE'] = $sess->get('LINE_STATE', $state);
    }
}
if ($cid !== '') {
    if (!is_numeric($cid)) {
        $result['NOTNUMERIC'] = 'NOT NUMERIC';
    } else {

        $conn_master = database::load($DB['MASTER']);
        $sql_master = "SELECT * FROM patient WHERE 1 AND cid='" . $cid . "'";
        $q_master = $conn_master->query($sql_master, 'NAME');

        $conn_hosxp = database::load($DB['HOSxP']);
        $sql_hosxp = "SELECT * FROM patient WHERE 1 AND cid='" . $cid . "'";
        $q_hosxp = $conn_hosxp->query($sql_hosxp, 'NAME');

        $status = 0;
        if (count($q_master) > 0) {
            $result['ALREADY'] = 'ALREADY';
        } else {
            $status++;
        }
        if (!(count($q_hosxp) > 0)) {
            $result['NOTFOUND'] = 'NOT FOUND';
        } else {
            $status++;
        }
        if ($status === 2) {
            $sess->set('CID', $cid);
            redirect::page($ROUTE['BASEURL'], 'register');
        }
    }
}

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => $result
);
view::renderOnLayout(array('req', 'footer'), 's002', $data);
