<?php

$sess = session::load();
$result = array();
if ($sess->get('LINE_CODE') === "" || $sess->get('LINE_STATE') === "" || $sess->get('CID') === "") {
    redirect::page($ROUTE['BASEURL'], 'welcome');
} else {
    $conn_hosxp = database::load($DB['HOSxP']);
    $sql_hosxp = "SELECT * FROM patient WHERE 1 AND cid='" . $sess->get('CID') . "'";
    $q_hosxp = $conn_hosxp->query($sql_hosxp, 'NAME');
    if (count($q_hosxp) > 0) {
        $result['CID'] = $q_hosxp[0]['cid'];
        $result['HN'] = $q_hosxp[0]['hn'];
        $result['FULLNAME'] = $q_hosxp[0]['fname'] . ' ' . $q_hosxp[0]['lname'];
        $result['BDATE'] = $q_hosxp[0]['bdate'];
        $result['SEX'] = $q_hosxp[0]['sex'];
    }



    $cid = method::post('cid');
    $hn = method::post('hn');
    if ($cid !== '' && $hn !== '') {
        $postdata = array(
            'grant_type' => 'authorization_code',
            'code' => $sess->get('LINE_CODE'),
            'redirect_uri' => $ROUTE['LINE_REDIRECT_URI'],
            'client_id' => $TOKEN['CLIENT_ID'],
            'client_secret' => $TOKEN['CLIENT_SECRET']
        );
        $patienttoken = json_decode(saladcurl::curlPost($ROUTE['LINE_REQ_TOKEN'], $postdata));
        if ($patienttoken->{'access_token'} !== null) {
            $conn_master = database::load($DB['MASTER']);
            $sql_master = "INSERT INTO patient (cid, hn, line_token) VALUES ('" . $cid . "', '" . $hn . "', '" . $patienttoken->{'access_token'} . "')";
            $q_master = $conn_master->execQuery($sql_master);
            $sess->clear_value();
            //$sess->clear_all();
            $sess->set('LINE_NOTIFY_COMPLTE', 'SUCCESS');
            redirect::page($ROUTE['BASEURL'], 'success');
        } else {
            $result['ACCESS_TOKEN_EXPIRE'] = '[access token] หมดอายุโปรดทำการร้องขอใหม่อีกครั้ง';
        }
        //print_r($q_master);
    }
}






$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'RESULT' => $result
);
view::renderOnLayout(array('register', 'footer'), 's002', $data);
