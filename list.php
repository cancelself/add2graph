<?php   
 
  echo "<table>\n";
  echo "<tr><th>" . $_SERVER['DOCUMENT_ROOT'] . "</th></tr>\n";
  $files = scandir($_SERVER['DOCUMENT_ROOT']);
  
  foreach($files as $file) {
    echo "<tr>\n";
    echo "<td>{$file}</td>\n";
    echo "</tr>\n";
  }
  echo "</table>\n\n";
  
 ?>