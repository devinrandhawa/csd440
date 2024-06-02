<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/18/2024, Module 8 Assignment  
  DevinderDropTable.php - This PHP script drops the table created in the baseball_01 database.
  It removes the table completely from the database.
-->
<html lang="en">

<head>
    <title>Devinder Drop Table</title>
</head>

<body>
    <h1>Devinder Drop DB Table in PHP using MySQLi</h1>

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
        echo "Connection successful!<br>";

        // Drop table if it exists
        $sql = "DROP TABLE IF EXISTS my_table";
        if ($conn->query($sql) === TRUE) {
            echo "Table my_table dropped successfully";
        } else {
            echo "Error dropping table: " . $conn->error;
        }

        $conn->close();
        ?>
     <br /><br />
<a href="DevinderIndex.php">Home</a>
</body>

</html>
