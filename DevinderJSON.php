<!DOCTYPE html>
<!--
  Devinder Randhawa, 03/03/2024, Module 10 Assignment
  DevinderJSON.php - This PHP handles form submission and displays data in JSON format.
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder JSON Form</title>
    
    <!-- CSS Styles -->
    <style>
        body {
            margin: 2%;
            font-family: Verdana, Arial, sans-serif;
        }

        h1 {
            font-size: 2.5em;
            margin-left: 5%;
            color: Red
        }

         h3 {
            font-size: 2.0em;
            margin-left: 5%;
            color: green
        }
        form {
            margin-left: 5%;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: right;
        }

        input {
            margin-left: 5px;
        }

        #submit {
            margin-left: 80px;
        }

        .error {
            color: red;
            margin-left: 5%;
        }

        .output {
            margin-left: 5%;
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
            width: 50%;
        }
    </style>
</head>
<body>
    
<!-- Form Section -->
<h1>Please Enter Your Data</h1>
<h3>Your Data Will be Presented in JSON Format</h3>
<form action="DevinderJSON.php" method="post">
    <label for="name">Name: </label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="age">Age: </label>
    <input type="number" id="age" name="age" required><br><br>
    <label for="email">Email: </label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="phone">Phone: </label>
    <input type="text" id="phone" name="phone" required><br><br>
    <label for="address">Address: </label>
    <input type="text" id="address" name="address" required><br><br>
    <label for="city">City: </label>
    <input type="text" id="city" name="city" required><br><br>
    <label for="country">Country: </label>
    <input type="text" id="country" name="country" required><br><br>
    <label for="zipcode">Zipcode: </label>
    <input type="text" id="zipcode" name="zipcode" required><br><br>
    <input type="submit" id="submit" value="Submit">
</form>

<!-- PHP Section -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if all required fields are filled
    $required_fields = ['name', 'age', 'email', 'phone', 'address', 'city', 'country', 'zipcode'];
    $errors = [];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "Field '$field' is required.";
        }
    }

    // If there are errors, display them
    if (!empty($errors)) {
        echo "<div class='error'>Error: " . implode("<br>", $errors) . "</div>";
    } else {
        
        // Encode form data into JSON format
        $json_data = json_encode($_POST, JSON_PRETTY_PRINT);

        // Display JSON data in a well-formatted output display
        echo "<div class='output'><pre>$json_data</pre></div>";
    }
}
?>
<br /><br />
    <!-- Back to Home -->
    <a href="DevinderJSON.php">Home</a>
</body>
</html>
