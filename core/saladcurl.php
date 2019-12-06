<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of saladcurl
 *
 * @author Saladin
 */
class saladcurl {

    public static function curlPost($url, $data) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);
        if ($error !== '') {
            throw new \Exception($error);
        }
        return $response;
    }

}
