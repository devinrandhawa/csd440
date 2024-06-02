<!DOCTYPE html>
<html lang='en'>
    <!--
      Professor Darrell Payne
      Bellevue University
     -->
  <head>

    <title> Example 01 </title>
    <meta charset='utf-8'>

  </head>

  <body>
  
    <!--
      Information to be displayed in the browser window.
     -->
  <?php 
  
  $cars3 = [[21, 22], [31, 32, 33], [41, 42, 43, 44, 45, 46], [77], [86, 87, 88, 89]];
  
  for ($x = 0; $x < sizeof($cars3); $x++) {
      for ($y = 0; $y < sizeof($cars3[$x]); $y++) {
          echo $cars3[$x][$y];
          echo " ";
      }
      echo "<br />";
  }
  ?>

  </body>

</html>