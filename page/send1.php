<?php

/* $sql = "SELECT * "
  . " FROM tbl_token"
  . " WHERE 1";

  $result = $this->Master_model->sql_statement($sql);
  foreach ($result as $r) {
  //$token = "nIzFF94gvuBvR86P5eSasQiOIER4QvkvI1k5h1JBKV9";
  if ($group == $r->gid) {
  $this->PushMessage($r->token, $post);
  } elseif ($group == -999) {
  $this->PushMessage($r->token, $post);
  } else {

  }
  } */

$cFile = null;
$file_name_with_full_path = $_SERVER['DOCUMENT_ROOT'] . '/noname/asset/images/virus-transparent-pixel.png';
if (function_exists('curl_file_create')) {
    $cFile = curl_file_create($file_name_with_full_path);
} else {
$cFile = '@' . realpath($file_name_with_full_path);
}
$body = array('message' => 'Test', 'imageFile' => $cFile);
$token = "vbwwOLrL0hq7VIWmMeHKziDf1qKFRBcfARBAYKFek6A";
$body = lineSender::PushMessage($token, $body);
