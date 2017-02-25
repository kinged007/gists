<?php
/**
 * Function pre_print
 * @param $var - variable to print to screen. Accepts all types.
 * @param $label - label to apply to the print, above the output.
 *
 *
 *
 *
 */
 function pre_print($var,$label = ''){
   echo "<pre style='width:95%;overflow:scroll;overflow-wrap: break-word;word-wrap: break-word;white-space: pre-wrap; background-color:rgb(205, 212, 126); padding: 10px 15px; margin: 0 auto;'>";
   echo "<h3>$label</h3>";
   $file = str_ireplace($_SERVER['DOCUMENT_ROOT'],"",debug_backtrace()[0]['file']);
   $line = debug_backtrace()[0]['line'];
   echo "Requested in (file) <strong>'$file'</strong> :: (line) <strong>'$line'</strong> :: (type) '<em><strong>".gettype($var)."</strong></em>'";
   if(is_array($var) AND !empty($var)) echo " :: (count) '<strong>".count($var)."</strong>'";
   if(is_bool($var)) $var = ($var) ? "<em>true</em>" : "<em>false</em>";
   if(is_string($var)) echo " :: (length) <strong>".strlen($var)."</strong>";
   if((is_array($var) OR is_object($var)) AND empty($var) ) $var = " -- empty -- ";
   echo "<br><br>";
   print_r($var);
   echo "</pre>";
 }

?>
