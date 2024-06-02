<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/18/2024, Module 8 Assignment  
  DevinderPopulateTable.php - This PHP script populates the table created in the baseball_01 database.
  It adds records to the table, fulfilling the requirement of having data in the database.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder Populate Table PHP</title>
</head>

<body>
    <h1>Devinder Populate Database Table in PHP using MySQLi</h1>

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

    // SQL to populate table with baseball player data including roles, teams, and games played
    $sql = "INSERT INTO my_table (name, age, email, registration_date, is_active, role, team, games_played) VALUES
            ('Mike Trout', 29, 'mike.trout@gmail.com', '2022-02-13', 1, 'Outfielder', 'Los Angeles Angels', 1200),
            ('Mookie Betts', 28, 'mookie.betts@yahoo.com', '2022-02-13', 1, 'Outfielder', 'Los Angeles Dodgers', 1100),
            ('Aaron Judge', 29, 'aaron.judge@hotmail.com', '2022-02-13', 1, 'Outfielder', 'New York Yankees', 1000),
            ('Fernando Tatis Jr.', 22, 'fernando.tatis@gmail.com', '2022-02-13', 1, 'Shortstop', 'San Diego Padres', 800),
            ('Jacob deGrom', 33, 'jacob.degrom@yahoo.com', '2022-02-13', 1, 'Pitcher', 'New York Mets', 900)";

    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo "Table 'my_table' populated successfully with baseball player data!";
    } else {
        // If there was an error with the query, display an error message along with the error details
        echo "Error populating table: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
    ?>
    <br /><br />
    <a href="DevinderIndex.php">Home</a>
</body>

</html>
