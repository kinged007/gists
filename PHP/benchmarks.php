<?php

$__start_time = microtime(true);
$__marks = array();
function benchmark($mark, $label = ''){
  global $__start_time, $__marks;
  if(is_array($mark) AND count($mark) == 2){
    $start = (isset($__marks[$mark[0]])) ? $__marks[$mark[0]] : microtime(true);
    $end = (isset($__marks[$mark[1]])) ? $__marks[$mark[1]] : microtime(true);
  } else {
    // save mark
    $__marks[$mark] = microtime(true);
  }
  $start = (isset($start)) ? $start : $__start_time;
  $end = (isset($end)) ? $end : microtime(true);
  $elapsed_time = substr($end - $start, 0, 5);
  return $elapsed_time . " - " . $mark . " $label";
}

function get_benchmarks(){
  global $__start_time, $__marks;
  $now = microtime(true);
  foreach($__marks as $k => $time){
    $marks[$k] = substr($time - $__start_time, 0, 5);
  }
  return $marks;
}
?>
