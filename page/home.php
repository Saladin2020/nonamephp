<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */
ini_set('memory_limit', -1);
ini_set('max_execution_time', 0);
$url = method::post('url');
$html = '';
if ($url != '') {
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        curl_close($ch);
    } catch (Exception $e) {
        echo $e;
    }

    // print_r($html);exit();
    $splitURL = explode('/', $url);
    if (strtolower($splitURL[0]) === "http:" || strtolower($splitURL[0]) === "https:") {
        $url = strtolower($splitURL[0]) . "//" . strtolower($splitURL[2]) . '/';
    } else {
        $url = "http://" . strtolower($splitURL[0]) . '/';
    }
}


$dom = new DOMDocument();
@$dom->loadHTML($html);
$newtag = '';
$i = 1;

$folder = 'FECTH_' . date('Ymshis');
$des = 'download/';
managefile::createdirectory($folder);
foreach ($dom->getElementsByTagName('img') as $link) {
    if (explode('/', $link->getAttribute('src'))[0] !== "http:" && explode('/', $link->getAttribute('src'))[0] !== "https:") {
        $newtag .= '<img width="100" src="' . $url . $link->getAttribute('src') . '"/>';
        $typeformat = managefile::typefile(file_get_contents($url . $link->getAttribute('src')));
        managefile::writefile($folder . '/' . $i . '.' . $typeformat, file_get_contents($url . $link->getAttribute('src')));
    } else {
        $newtag .= '<img width="100" src="' . $link->getAttribute('src') . '"/>';
        $typeformat = managefile::typefile(file_get_contents($link->getAttribute('src')));
        managefile::writefile($folder . '/' . $i . '.' . $typeformat, file_get_contents($link->getAttribute('src')));
    }
    if ($i % 20 == 0) {
        $newtag .= "</br>";
    } else {
        $newtag .= "&nbsp;&nbsp;";
    }
    $i++;
}
managefile::zipfile($folder);
managefile::deletefiles($folder);
managefile::movefile($folder . '.zip', $des . $folder . '.zip');

$data = array(
    'TITLE' => 'Fecth data',
    'BASEURL' => $ROUTE['BASEURL'],
    'HEADERNAME' => 'Fecth data',
    'RESULT' => $newtag
);
view::render('home', $data);
