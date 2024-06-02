<!DOCTYPE html>
<!--
  Devinder Randhawa, 02/11/2024, Module 6 Assignment  
  Creating a program that defines a class DevinderMyInteger that holds a single integer.
  And provides methods to check if it's even, odd, and prime, as well as getter and setter methods.
-->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing DevinderMyInteger Class</title>
</head>
<body>
    <h1>Testing DevinderMyInteger Class</h1>
    
    <?php
    
    class DevinderMyInteger
    {
        private $number;

        /**
         * DevinderMyInteger constructor.
         * @param int $number The integer value to be set.
         */
        public function __construct($number)
        {
            $this->number = $number;
        }

        /**
         * Check if the stored integer is even.
         * @return bool True if the integer is even, false otherwise.
         */
        public function isEven()
        {
            return $this->number % 2 === 0;
        }

        /**
         * Check if the stored integer is odd.
         * @return bool True if the integer is odd, false otherwise.
         */
        public function isOdd()
        {
            return $this->number % 2 !== 0;
        }

        /**
         * Check if the stored integer is a prime number.
         * @return bool True if the integer is prime, false otherwise.
         */
        public function isPrime()
        {
            if ($this->number <= 1) {
                return false;
            }
            for ($i = 2; $i * $i <= $this->number; $i++) {
                if ($this->number % $i === 0) {
                    return false;
                }
            }
            return true;
        }

        /**
         * Getter method to retrieve the stored integer.
         * @return int The stored integer.
         */
        public function getNumber()
        {
            return $this->number;
        }

        /**
         * Setter method to set a new integer value.
         * @param int $number The new integer value to set.
         */
        public function setNumber($number)
        {
            $this->number = $number;
        }
    }

    // Creating two instances
    $integer1 = new DevinderMyInteger(17);
    $integer2 = new DevinderMyInteger(24);

    // Testing all the methods
    echo "<h3>The Number 1 is: " . $integer1->getNumber() . "</h3>";
    echo "<p>Is Number 1 even? " . ($integer1->isEven() ? "Yes" : "No") . "</p>";
    echo "<p>Is Number 1 odd? " . ($integer1->isOdd() ? "Yes" : "No") . "</p>";
    echo "<p>Is Number 1 prime? " . ($integer1->isPrime() ? "Yes" : "No") . "</p>";
    echo "<br>";

    echo "<h3>The Number 2 is: " . $integer2->getNumber() . "</h3>";
    echo "<p>Is Number 2 even? " . ($integer2->isEven() ? "Yes" : "No") . "</p>";
    echo "<p>Is Number 2 odd? " . ($integer2->isOdd() ? "Yes" : "No") . "</p>";
    echo "<p>Is Number 2 prime? " . ($integer2->isPrime() ? "Yes" : "No") . "</p>";
    echo "<br>";

    // Testing getter and setter methods
    echo "<h3>Testing getter and setter methods:</h3>";
    echo "<p>Before setting new value for Number 1: " . $integer1->getNumber() . "</p>";
    $integer1->setNumber(30);
    echo "<p>After setting new value for Number 1: " . $integer1->getNumber() . "</p>";

    ?>
</body>
</html>

