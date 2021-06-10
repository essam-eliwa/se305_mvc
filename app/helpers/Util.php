<?php
/*
 * Util Functions
 */
namespace Util;
const APP_ROOT = '../app/';

function pathBuilder($dirName, $fileName){
    return APP_ROOT.$dirName .'/'. $fileName . '.php';
}

function debug($valArray){
    foreach ($valArray as $val) {
        echo $val;
        echo '<br>';
    }
    echo '<hr>';
}