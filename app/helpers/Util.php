<?php
/*
 * Util Functions
 */
namespace Util;
const APP_ROOT = '../app/';

function pathBuilder($dirName, $fileName){
    return APP_ROOT.$dirName .'/'. $fileName . '.php';
}