<?php


/**
 * Function slug
 * @return  slug string of a string. 
 *
 *
 *
 *
 *
 */
function slug($z){
    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = str_replace(' ', '-', $z);
    return trim($z, '-');
}
