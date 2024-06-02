<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/11/2024, Module 7 Assignment  
  DevinderForm.php that creates a form to prompt the user to enter seven different fields of data,
  using a minimum of four different data type entries. Upon submission, it verifies the fields and 
  displays the entered data or an error message if any field is missing or incorrectly entered.
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DevinderForm PHP</title>
    
</head>
<body>
    <!-- Title with special styling -->
    <style>
        /* Define CSS for the title and h2 elements */
        .title {
            color: Red; /* Set the title text color to Red */
        }
    </style>
    <h1 class="title">Customer Biodata Form</h1>
    <h2 style="color: green;">Your Biodata:</h2>
    <?php

    // Defining variables and set to empty values
    $fnameErr = $mnameErr = $lnameErr = $birthdayErr = $phoneErr = $textareaErr = $emailErr = "";
    $fname = $mname = $lname = $birthday = $phone = $textarea = $email = "";
    $formSubmitted = false; // Variable to track if the form has been submitted

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $formSubmitted = true; // Set to true when the form is submitted

            // Assigning values from POST data
            $fname = $_POST["fname"];
            if(empty($fname)) {
                $fnameErr = "First Name is required";
            }

            $mname = $_POST["mname"]; // Middle name is optional

            $lname = $_POST["lname"];
            if(empty($lname)) {
                $lnameErr = "Last Name is required";
            }

            $birthday = $_POST["birthday"];
            if(empty($birthday)) {
                $birthdayErr = "Birthday is required";
            }

            $phone = $_POST["phone"];
            if(empty($phone)) {
                $phoneErr = "Phone Number is required";
            }

            $textarea = $_POST["textarea"];
            if(empty($textarea)) {
                $textareaErr = "Address is required";
            }

            $email = $_POST["email"]; // Email is optional
        }
    } catch(Exception $e) {

        // Error handling
        echo "<h1>Something went wrong</h1>";
    }
    ?>

    <?php if ($formSubmitted && empty($fnameErr) && empty($lnameErr) && empty($birthdayErr) && empty($phoneErr) && empty($textareaErr)): ?>

        <!-- Displaying entered information -->
        <p>First Name: <?php echo $fname; ?></p>
        <p>Middle Name: <?php echo $mname; ?></p>
        <p>Last Name: <?php echo $lname; ?></p>
        <p>Birthday: <?php echo $birthday; ?></p>
        <p>Phone Number: <?php echo $phone; ?></p>
        <p>Address: <?php echo $textarea; ?></p>
        <p>Email: <?php echo $email; ?></p>
    <?php else: ?>

        <!-- Displaying form if not submitted or if there are errors -->
        <form action="" method="post">
            <!-- Input field for First Name -->
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''; ?>" required><br><br>

           <!-- Input field for middle initial -->
            <label for="mname">Middle name:</label>
            <input type="text" id="mname" name="mname" value="<?php echo isset($_POST['mname']) ? $_POST['mname'] : ''; ?>"><br><br>

            <!-- Input field for Last Name -->
            <label for="lname">Last name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" required><br><br>

            <!-- Input field for Birthday -->
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" value="<?php echo isset($_POST['birthday']) ? $_POST['birthday'] : ''; ?>" required><br><br>

            <!-- Input field for Phone # -->
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" required>
            <small>Format: 123-456-7890</small><br><br>

            <!-- Input field for Address -->
            <label for="textarea">Address:</label>
            <textarea id="textarea" name="textarea" rows="6" cols="50" required><?php echo isset($_POST['textarea']) ? $_POST['textarea'] : ''; ?></textarea><br><br>

            <!-- Input field for Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br><br>

            <!-- Submit Button -->
            <input type="submit" value="Submit">
        </form>
    <?php endif; ?>
</body>
</html>
