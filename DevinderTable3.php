<!--
  Devinder Randhawa, 01/21/2024, Module 3 Assignment  
  PHP function that generates the value to be displayed in each cell of the table. 
  This function takes two random numbers as parameters, calculates and returns that sum. 
-->
<!-- DevinderTable3.php -->

<?php
// Include the external functions file
include 'functions.php';

// Define the number of rows and columns in the table
$rows = 8;
$columns = 8;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder's Table 3</title>
    <h2>External file Generating The Sums of the Two Random Numbers in Each Cell</h2>
</head>

<body>

<?php
// Start the table and outer loop for rows
echo "<table border='1' width='800'>\n";
for ($i = 1; $i <= $rows; $i++) {
    // Start a new row
    echo "<tr>\n";
    
    // Start the inner loop for columns
    for ($j = 1; $j <= $columns; $j++) {
        // Generate two random numbers
        $randomNum1 = rand(1, 20);
        $randomNum2 = rand(1, 20);
        
        // Use the generateSum function to get the sum
        $sum = generateSum($randomNum1, $randomNum2);

        // Display the sum in the cell with a visible border
        echo "\t<td style=\"border: 1px solid Red;\">$sum</td>\n";
    }
    
    // Close the row
    echo "</tr>\n";
}

// Close the HTML table tags
echo "</table>\n";
?>
</body>
</html>
