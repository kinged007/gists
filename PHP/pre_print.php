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
  echo "<h3>$label</h3>";
  echo "<pre style='width:90%;max-width:960px;overflow:scroll;overflow-wrap: break-word;word-wrap: break-word;white-space: pre-wrap; background-color:rgb(205, 212, 126); padding: 5px;'>";
  echo "variable type: ".gettype($var)."<br>";
  print_r($var);
  echo "</pre>";
}

?>
