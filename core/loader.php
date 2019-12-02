<?php

/* @author Saladin */
/* NONAME FRAMEWORK BUILD BY ME */

$directorys = array(
    'config/',
);
foreach ($directorys as $directory) {
    if (is_dir($directory)) {
        if ($dh = opendir($directory)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != "." && $file != "..") {
                    require_once($directory . $file);
                }
            }
            closedir($dh);
        }
    }
}

function __autoload($class_name) {
    $directorys = array(
        'core/',
    );
    foreach ($directorys as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}
