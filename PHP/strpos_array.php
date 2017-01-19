<?php

/**
 * Function strpos_array
 * loops through (array) $needles and finds the position of a string in haystack
 *
 * @author unknown
 * @param $haystack - string to search in
 * @param $needles - (mixed) string/array to search for
 * @param $offset
 * @return assoc array of string positions
 */
function strpos_array($haystack, $needles, $offset=0) {
    $matches = array();

    //Avoid the obvious: when haystack or needles are empty, return no matches
    if(empty($needles) || empty($haystack)) {
        return $matches;
    }

    $haystack = (string)$haystack; //Pre-cast non-string haystacks
    $haylen = strlen($haystack);

    //Allow negative (from end of haystack) offsets
    if($offset < 0) {
        $offset += $heylen;
    }

    //Use strpos if there is no array or only one needle
    if(!is_array($needles)) {
        $needles = array($needles);
    }

    $needles = array_unique($needles); //Not necessary if you are sure all needles are unique

    //Precalculate needle lengths to save time
    foreach($needles as &$origNeedle) {
        $origNeedle = array((string)$origNeedle, strlen($origNeedle));
    }

    //Find matches
    for(; $offset < $haylen; $offset++) {
        foreach($needles as $needle) {
            list($needle, $length) = $needle;
            if($needle == substr($haystack, $offset, $length)) {
                $matches[] = $offset;
                break;
            }
        }
    }

    return($matches);
}

?>
