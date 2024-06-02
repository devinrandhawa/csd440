<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/24/2024, Module 9 Assignment  
  DevinderForms.php adds records to the database via a form.
  This PHP file provides a form for users to input data, which is then added into the database.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Add Record Form</title>
    <style>
        label {
            display: inline-block;
            width: 150px; 
            text-align: center;
            margin-right: 1px;
        }
    </style>
</head>
<body>
    <h1>Devinder Add Record Form</h1>
    <!-- Form for adding a new record -->
    <form action="DevinderForms.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="registration_date">Registration Date (yyyy mm dd):</label>
        <input type="text" id="registration_date" name="registration_date" pattern="\d{4} \d{2} \d{2}" placeholder="yyyy mm dd" required><br><br>
        
        <label for="is_active">Active:</label>
        <select id="is_active" name="is_active">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br><br>
        
        <label for="role">Role:</label>
        <input type="text" id="role" name="role"><br><br>
        
        <label for="team">Team:</label>
        <input type="text" id="team" name="team"><br><br>
        
        <label for="games_played">Games Played:</label>
        <input type="number" id="games_played" name="games_played"><br><br>
        
        <input type="submit" value="Submit Your Data" name="submit">
    </form>

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

    // Check if the form is submitted
    if(isset($_POST['submit'])){
        // Retrieve form data
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $registration_date = date('Y-m-d', strtotime($_POST['registration_date']));
        $is_active = $_POST['is_active'];
        $role = $_POST['role'];
        $team = $_POST['team'];
        $games_played = $_POST['games_played'];

        // Prepare and execute SQL statement to insert data into the database
        $sql = $conn->prepare("INSERT INTO my_table (name, age, email, registration_date, is_active, role, team, games_played) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('sisssssi', $name, $age, $email, $registration_date, $is_active, $role, $team, $games_played);
        
        if ($sql->execute()) {
            echo "<br /> <p>Entry submitted successfully!</p>";
        } else {
            echo "Error: " . $sql->error;
        }
    }

    // Close connection
    $conn->close();
    ?>
    <br />
    <a href="DevinderIndex.php">Home</a>
</body>
</html>
