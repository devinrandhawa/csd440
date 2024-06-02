<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/18/2024, Module 8 Assignment  
  DevinderQueryTable.php - This PHP script tests the functionality of the table created in the baseball_01 database.
  It retrieves data from the table and displays it, ensuring that the table was created and populated correctly.
-->
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Devinder Query Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        
        
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    
    <h1>Devinder Query DB Table in PHP using MySQLi</h1>
    
    <center>
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

        // Query the table to get everything
        $sql = "SELECT * FROM my_table";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "Error executing query: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Registration Date</th><th>Active</th><th>Role</th><th>Team</th><th>Games Played</th></tr>";
            
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["age"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . date("Y-m-d", strtotime($row["registration_date"])) . "</td>";
                echo "<td>" . ($row["is_active"] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>" . $row["team"] . "</td>";
                echo "<td>" . $row["games_played"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No results found";
        }

        $conn->close();
        ?>
        <br /><br />
    <a href="DevinderIndex.php">Home</a>
    </center>
</body>

</html>
