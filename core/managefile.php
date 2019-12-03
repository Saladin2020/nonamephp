<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

class managefile {

    public static function walkdirectory($dir) {
        $fileset = scandir($dir);
        return $fileset;
    }

    public static function typefile($data) {
        $mime = array(
            // images
            'image/png' => 'png',
            'image/jpeg' => 'jpe',
            'image/jpeg' => 'jpeg',
            'image/jpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/bmp' => 'bmp',
            'image/vnd.microsoft.icon' => 'ico',
            'image/tiff' => 'tiff',
            'image/tiff' => 'tif',
            'image/svg' => 'svg',
            'image/svg+xml' => 'svg',
            'image/svg+xml' => 'svgz',
            'text/html' => 'svg'
        );
        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->buffer($data);
        return $mime[$mime_type];
    }

    public static function writefile($filename, $data) {
        $fp = fopen($filename, "w+") or die("Unable to open file!");
        fwrite($fp, $data);
        fclose($fp);
    }

    public static function readfile($filepath) {
        $data = '';
        $fp = fopen($filepath, "r") or die("Unable to open file!");
        $data = fread($fp, filesize($filepath));
        fclose($fp);
        return json_decode($data);
    }

    public static function tbl2file($filepath, $data) {
        if (count($data) > 0) {
            $fp = fopen($filepath, "w+") or die("Unable to open file!");
            fputcsv($fp, array_keys($data[0]), '|');
            foreach ($data as $val) {
                fputcsv($fp, $val, '|');
            }
            fclose($fp);
            return true;
        } else {

            $fp = fopen($filepath, "w+") or die("Unable to open file!");
            fclose($fp);
            return false;
        }
    }

    public static function zipfile($dir) {
        $zip = new ZipArchive;
        if ($zip->open($dir . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir . '/'));
            foreach ($iterator as $key => $value) {
                if ($key !== $dir . '\.' && $key !== $dir . '\..') {
                    $zip->addFile(realpath($key), $key) or die("ERROR: Could not add file: $key");
                }
            }
            $zip->close();
            return true;
        } else {
            return false;
        }
    }

    public static function createdirectory($dirname) {
        if (is_dir($dirname) === false) {
            mkdir($dirname);
        }
    }

    public static function deletefiles($dir) {
        foreach (glob($dir . '/*') as $file) {
            if (is_dir($file))
                deletefiles($file);
            else
                unlink($file);
        }
        rmdir($dir);
    }

    public static function movefile($source, $destination) {
        rename($source, $destination);
    }

}
