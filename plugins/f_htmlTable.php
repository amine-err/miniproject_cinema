<?php
// function to show array of 2 dimentions, leaves only first line keys
function htmlTable($array, $option) {
  echo "<table $option><thead><tr>";
  foreach ($array[0] as $key => $value) { echo "<th>".$key."</th>"; }
  echo "</tr></thead><tbody>";
  foreach ($array as $subarray) {
    echo "<tr>";
    foreach ($subarray as $value) { echo "<td>".$value."</td>"; }
    echo "</tr>";
  }
  echo "</tr></tbody></table>";
}
?>