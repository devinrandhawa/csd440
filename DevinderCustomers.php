<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/04/2024, Module 5 Assignment  
  DevinderCustomers.php - Displays and filters customer information using array methods.
  This program creates an array of customers with their first name, last name, age, and phone number.
  It then displays all customers, finds customers with specific criteria, and displays the results.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinder Customers</title>
</head>
<body>

<?php

// Define Customer class to hold customer information

class Customer {
    public $firstName;
    public $lastName;
    public $age;
    public $phone;

    function __construct($firstName, $lastName, $age, $phone) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->phone = $phone;
    }
}

// Create an array of customers 

$customers = [
    new Customer("Michael", "Jackson", 30, "123-204-7890"),
    new Customer("Susan", "Smith", 25, "987-654-3210"),
    new Customer("Larry", "Johnson", 40, "456-789-6780"),
    new Customer("Maria", "Sweet", 35, "789-012-3456"),
    new Customer("David", "Singh", 28, "234-567-8901"),
    new Customer("Sarah", "Taylor", 32, "567-890-1234"),
    new Customer("Jose", "Martinez", 45, "345-678-9012"),
    new Customer("Jason", "Leo", 27, "909-901-2345"),
    new Customer("Sonia", "Singh", 38, "901-234-5678"),
    new Customer("Brenda", "Jackson", 29, "234-345-6789")
];

// Display all customers in a table

echo "<h2>My Arrays of Customers:</h2>";
displayCustomers($customers);

// Display Randomized Index with array_rand()
echo "<h3>Retrieving Randomized Index with array_rand()</h3>";
$rando = array_rand($customers);
echo "First Name: " . $customers[$rando]->firstName . "<br />";
echo "Last Name: " . $customers[$rando]->lastName . "<br />";
echo "Age: " . $customers[$rando]->age . "<br />";
echo "Phone Number: " . $customers[$rando]->phone . "<br />";

// Display First Element with count()

echo "<h3>Retrieving the First Customer using count()</h3>";
echo "First Name: " . $customers[0]->firstName . "<br />";
echo "Last Name: " . $customers[0]->lastName . "<br />";
echo "Age: " . $customers[0]->age . "<br />";
echo "Phone Number: " . $customers[0]->phone . "<br />";

// Displaying Last Element with count()

echo "<h3>Retrieving the Last Customer using count()</h3>";
$lastIndex = count($customers) - 1;
echo "First Name: " . $customers[$lastIndex]->firstName . "<br />";
echo "Last Name: " . $customers[$lastIndex]->lastName . "<br />";
echo "Age: " . $customers[$lastIndex]->age . "<br />";
echo "Phone Number: " . $customers[$lastIndex]->phone . "<br />";

// Display Last Element with count() after array_reverse()

echo "<h3>Retrieving Last Element with count() after array_reverse()</h3>";
$newArray = array_reverse($customers);
echo "First Name: " . $newArray[0]->firstName . "<br />";
echo "Last Name: " . $newArray[0]->lastName . "<br />";
echo "Age: " . $newArray[0]->age . "<br />";
echo "Phone Number: " . $newArray[0]->phone . "<br />";

//  Display Finding a specific element with array_search()

echo "<h3>Locating a Specific Customer with array_search()</h3>";
$targetCustomer = new Customer("Sarah", "Taylor", 32, "567-890-1234");
$index = array_search($targetCustomer, $customers);
if ($index !== false) {
    echo "Customer found at index $index:<br />";
    echo "First Name: " . $customers[$index]->firstName . "<br />";
    echo "Last Name: " . $customers[$index]->lastName . "<br />";
    echo "Age: " . $customers[$index]->age . "<br />";
    echo "Phone Number: " . $customers[$index]->phone . "<br />";
} else {
    echo "Customer not found.";
}

// Function to display customers in a table

function displayCustomers($customers) {
    echo "<table>";
    
   // Display table header row with column headings, added extra space to improve readabilty
    echo "<tr><th>First Name&nbsp;&nbsp;</th><th>Last Name&nbsp;&nbsp;</th><th>Age&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Phone Number</th></tr>";

    foreach ($customers as $customer) {
        echo "<tr>";
        echo "<td>" . $customer->firstName . "</td>";
        echo "<td>" . $customer->lastName . "</td>";
        echo "<td>" . $customer->age . "</td>";
        echo "<td>" . $customer->phone . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
