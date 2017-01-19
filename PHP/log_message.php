<?php


// Settings: set log level.
// move these variables into config file
$__log_message_log_level    = 2;                            // 0 = debug, 1 = notice only, 2 = warnings only, 3 = errors only
$__log_message_debug        = true;                         // true / false
$__log_message_log_dir      = dirname(__DIR__) . "/logs/";  // ie. '../logs/' absolute path


/**
 * Log message function
 * if in DEBUG mode, will output to screen.
 *
 *
 *
 *
 * @return message string.
 */
function log_message($type = 'notice', $message = '', $var = ''){
  if($message == '') return;
  global $__log_message_log_level, $__log_message_debug, $__log_message_log_dir;
  $sp = "\t";   // spacer/separator
  $lb = "\n";   // line separator
  $__log_message_log_level = (isset($__log_message_log_level)) ? $__log_message_log_level : 2;
  $__log_message_debug = (isset($__log_message_debug)) ? $__log_message_debug : false;
  $__log_message_log_dir = (isset($__log_message_log_dir)) ? $__log_message_log_dir : dirname(__DIR__) . "/logs/";
  // get log level
  switch($type) {
    case "notice" : $lv = 1; break;
    case "warning" : $lv = 2; break;
    case "error" : $lv = 3; break;
    case "debug" :
    default : $lv = 0;
  }
  if( $lv < $__log_message_log_level AND !$__log_message_debug ) return;
  $var = ($var == '') ? '' : print_r($var, 1);
  $str = "[$type]$sp".date("Y-m-d H:i:s", time() ).$sp.$message.$pvar.$lb;
  if(!file_exists($__log_message_log_dir)) mkdir($__log_message_log_dir);
  if($__log_message_debug) echo "<pre>$str</pre>";
  $__log_message_log_dir = rtrim($__log_message_log_dir,"/")."/";
  @file_put_contents($__log_message_log_dir . $type . "-" . date("Y-m-d",time()) . ".log", $str, FILE_APPEND | LOCK_EX );
  return $str;
}
