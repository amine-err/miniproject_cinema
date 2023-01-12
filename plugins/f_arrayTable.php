<?php
// More complicated function used to show arrays of any dimention
function arrayTable($array, $kindex=false, $nested=true, $kpa=array()) {
// $array: array to print. | $kindex: show keys of indexed arrays.
// $nested: print <table> element. | $kpa: keys of previous array.
  $table = array(null, null, null);
  foreach ($array as $key => $value) {
    if( is_array($value) or is_object($value) ) {
      if ( $kindex or !array_is_list($array) ) {
        $table[0] .= "<tr><th>".$key."</th><td>".arrayTable($value, $kindex)."</td></tr>";
      } else {
        $kpa = isset($array[$key-1]) ? array_keys($array[$key-1]) : $kpa;
        $table[0] .= arrayTable($value, $kindex, false, $kpa); }
    } else {
      if ( ($kindex or !array_is_list($array)) and array_keys($array)!=$kpa) {
      $table[1] .= "<th>".$key."</th>";}
      $table[2] .= "<td>".$value."</td>";
      $table[0] = "<tr>".$table[1]."</tr><tr>".$table[2]."</tr>";
    }
  }
  return $table[0] = $nested ? "<table border=\"1\">".$table[0]."</table>" : $table[0];
}
?>