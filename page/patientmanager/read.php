<?php
//prepare
$conn = database::load($DB['MASTER']);
$tablename = 'patient';
$rowFetch = 10;
$col = array(
    '*'
);
$result['COLHEAD'] = array(
    'เลขบัตรปรชาชน',
    'hn',
    'LINE TOKEN'
);

//process
$pageSelection = crud::setup_pagination(method::get('pg'), $rowFetch);
$condfind = "";
if (method::postAll() != null) {

    foreach (method::postAll() as $value) {
        $condfind .= " AND " . $value;
    }
    $condfind = trim($condfind, " AND");
    $condfind = "AND (" . $condfind . ")";
    $pageSelection['COND'] = $condfind;
}
$condition = array(
    $pageSelection['COND']
);

$result['COLSTATUS'] = crud::colstatus($conn, $tablename);
$result['DATA'] = crud::read($conn, $tablename, $col, $condition);
$paginationShow = crud::count_pagination(crud::read($conn, $tablename, $col, []), $rowFetch);

$data = array(
    'TITLE' => 'yNotification',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'yNotification',
    'CRUDROUTE' => $ROUTE['BASEURL'] . '/index.php/patientmanager/',
    'RESULT' => $result,
    'SIDEBAR' => $MENU['SIDEBAR'],
    'ROWNUMBER' => ($pageSelection['P'] * $rowFetch) + 1,
    'PAGENUMBER' => $paginationShow,
    'STATEFIND' => $condfind,
);
view::renderOnLayout(array('nav', 'menu', 'patientmanager', 'footer'), 's001', $data);
