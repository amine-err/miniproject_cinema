<?php
// function to show array of 2 dimentions, leaves only first line keys
function htmlTable($array) {
  echo "<table border=\"1\"><thead><tr>";
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