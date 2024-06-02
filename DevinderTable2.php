<!--
  Devinder Randhawa, 01/21/2024, Module 2 Assignment  
  PHP program that creates an HTML table using a PHP nested loop structure. 
  Displaying a two dimensional table holding PHP generated random numbers in each cell. 
-->
<!-- DevinderTable2.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder's Table 2</title>
    <h2>Two Dimensional Table Generating Random Numbers in Each Cell</h2>
</head>
<body>

<?php
// Function to generate a random number between 1 and 100
function generateRandomNumber() {
    return rand(1, 20);
}

// Define the number of rows and columns in the table
$rows = 8;
$columns = 8;

// Start the table and outer loop for rows
echo "<table border='1' width='700'>\n";
for ($i = 1; $i <= $rows; $i++) {
    echo "\t<tr>\n";
    // Start the inner loop for columns
    for ($j = 1; $j <= $columns; $j++) {
        // Generate a random number and display it in the cell with a visible border
        echo "\t\t<td style=\"border: 1px solid red;\">" . generateRandomNumber() . "</td>\n";
    }
    echo "\t</tr>\n";
}
// Close the HTML table tags
echo "</table>\n";
?>

</body>
</html>
