<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/24/2024, Module 9 Assignment  
  DevinderQuery.php searches database records based on user input.
  This PHP file allows users to search for specific records in the database using form input.
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Devinder Query Page</title>
    <style>
        label {
            display: inline-block;  /* Displaying labels as blocks */
            width: 150px;           /* Setting fixed width for labels */
            text-align: center;     /* Center-aligning label text */
            margin-right: 10px;     /* Adding a small margin to the right of labels */
        }
    </style>
</head>
<body>
    <!-- Form for searching records -->
    <h1>Devinder Query Page - Search Based on User Form Input</h1>
    <form action="DevinderQuery.php" method="post">
        <label for="search_name">Search by Name:</label>
        <input type="text" id="search_name" name="search_name"><br><br>
        
        <label for="search_team">Search by Team:</label>
        <input type="text" id="search_team" name="search_team"><br><br>

        <label for="search_age">Search by Age:</label>
        <input type="number" id="search_age" name="search_age"><br><br>

        <label for="search_role">Search by Role:</label>
        <input type="text" id="search_role" name="search_role"><br><br>

        <label for="search_email">Search by Email:</label>
        <input type="email" id="search_email" name="search_email"><br><br>

        <label for="search_registration_date">Search by Registration Date:</label>
        <input type="text" id="search_registration_date" name="search_registration_date" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD"><br><br>

        <label for="search_games_played">Search by Games Played:</label>
        <input type="number" id="search_games_played" name="search_games_played"><br><br>

        <label for="search_is_active">Search by Active:</label>
        <select id="search_is_active" name="search_is_active">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br><br>

        <input type="submit" value="Submit to Search">
    </form>

    <?php
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get search parameters from the form
        $search_name = $_POST['search_name'];
        $search_team = $_POST['search_team'];
        $search_age = $_POST['search_age']; 
        $search_role = $_POST['search_role']; 
        $search_email = $_POST['search_email']; 
        $search_registration_date = $_POST['search_registration_date']; 
        $search_games_played = $_POST['search_games_played']; 
        $search_is_active = $_POST['search_is_active']; 
        
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

        // Prepare SQL query
        $sql = "SELECT * FROM my_table WHERE name LIKE '%$search_name%' AND team LIKE '%$search_team%'";

        // Search criteria in the SQL query
        if (!empty($search_age)) {
            $sql .= " AND age = $search_age";
        }
        if (!empty($search_role)) {
            $sql .= " AND role LIKE '%$search_role%'";
        }
        if (!empty($search_email)) {
            $sql .= " AND email LIKE '%$search_email%'";
        }
        if (!empty($search_registration_date)) {
            $sql .= " AND registration_date = '$search_registration_date'";
        }
        if (!empty($search_games_played)) {
            $sql .= " AND games_played = $search_games_played";
        }
        if ($search_is_active !== '') {
            $sql .= " AND is_active = $search_is_active";
        }

        // Execute SQL query
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result) {
            if ($result->num_rows > 0) {
                echo "<h2>Search Results:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Name</th><th>Age</th><th>Email</th><th>Registration Date</th><th>Active</th><th>Role</th><th>Team</th><th>Games Played</th></tr>";
                
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
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
            
            // Free result set
            $result->free();
        } else {
            echo "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
    <br /><br />
    <a href="DevinderIndex.php">Home</a>
</body>
</html>
