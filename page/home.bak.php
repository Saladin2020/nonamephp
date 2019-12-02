<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);
$hoscode = method::post('hoscode');
$startdate = method::post('startdate');
$enddate = method::post('enddate');
$doctorcode = method::post('doctorcode');

$conn = database::load($DB['MASTER']);

$data = array(
    'title' => '43 Files Export',
    'BASEURL' => $ROUTE['BASEURL']
);
view::render('home', $data);


if ($hoscode !== '' && $startdate !== '' && $enddate !== '') {
    $dir = "F43_" . $hoscode . "_" . date("YmdHis");
    managefile::createdirectory($dir);

    $dirscript = "asset/F43_Script/";
    $filescript = managefile::walkdirectory($dirscript);



    for ($i = 2; $i < count($filescript); $i++) {

        $json = managefile::readfile($dirscript . $filescript[$i]);
        $sqltemplate = $json->{'SQLSCRIPT'};
        $sqltransform = str_replace('[#HOSCODE]', $hoscode, $sqltemplate);
        $sqltransform = str_replace('[#DATE_START]', $startdate, $sqltransform);
        $sqltransform = str_replace('[#DATE_END]', $enddate, $sqltransform);

        //NCD
        $tmp = explode("-", $enddate);
        $sqltransform = str_replace('[#YEAR]', $tmp[0], $sqltransform);

        //PRENATAL
        $tmp = explode("-", $startdate);
        $sqltransform = str_replace('[#DATE_START_T]', $tmp[0] + $tmp[1] + $tmp[2], $sqltransform);
        $tmp = explode("-", $enddate);
        $sqltransform = str_replace('[#DATE_END_T]', $tmp[0] + $tmp[1] + $tmp[2], $sqltransform);
        $sqltransform = str_replace('[#DOCTOR]', $doctorcode, $sqltransform);


        $result = $conn->query($sqltransform, "NAME");
        $status = managefile::tbl2file($dir . "/" . $json->{'NAME'} . ".txt", $result);
        $text = $json->{'NAME'} . ".txt";
        $data = array(
            'BASEURL' => $ROUTE['BASEURL'],
            'msg' => $text,
            'sts' => $status
        );
        view::render2('message', $data);
    }

    $status = managefile::zipfile($dir);
    $text = $dir . ".zip";
    $data = array(
        'BASEURL' => $ROUTE['BASEURL'],
        'msg' => $text,
        'sts' => $status
    );
    view::render2('message', $data);

    managefile::deletefiles($dir);
    managefile::movefile($dir . '.zip', 'download/' . $dir . '.zip');


    $data = array(
        'BASEURL' => $ROUTE['BASEURL'],
        'text' => ' Download',
        'link' => $ROUTE['BASEURL'] . '/download/' . $dir . '.zip'
    );
    view::render('popup', $data);
}

