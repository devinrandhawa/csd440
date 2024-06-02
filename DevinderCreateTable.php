<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/18/2024, Module 8 Assignment  
  DevinderCreateTable.php - This PHP script creates a table in the baseball_01 database.
  The table will have a minimum of 5 fields, with more than one data type, as required by the assignment.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder Create Table PHP</title>
</head>

<body>
    <h1>Devinder Create DB Table in PHP using MySQLi</h1>
   
    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "student1";
    $password = "pass";
    $database = "baseball_01";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the table already exists
    $table_name = "my_table";
    $sql_check_table = "SHOW TABLES LIKE '$table_name'";
    $result_check_table = $conn->query($sql_check_table);

    if ($result_check_table->num_rows == 0) {
        // SQL to create table with additional columns for player roles, teams, and games
        $sql = "CREATE TABLE my_table (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            age INT(3),
            email VARCHAR(50) NOT NULL,
            registration_date TIMESTAMP,
            is_active BOOLEAN,
            role VARCHAR(50),
            team VARCHAR(50),
            games_played INT
        )";

        // Execute SQL query and handle errors
        if ($conn->query($sql) === TRUE) {
            echo "Table my_table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Table $table_name already exists";
    }

    // Close connection
    $conn->close();
    ?>
 <br /><br />
<a href="DevinderIndex.php">Home</a>
</body>

</html>
