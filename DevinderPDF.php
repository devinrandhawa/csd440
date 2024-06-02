<?php
// Include FPDF library
require("fpdf.php");

// Devinder Randhawa, 03/10/2024, Module 8 Assignment  
// DevinderPDF.php displays general information about the topic related to the data
// and then displays the data in a table format Including a data table a header and a footer.

// Define the TablePDF class
class TablePDF extends FPDF {
    // Header
    function Header() {
        // Select Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Baseball Players Information',0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function buildTable($header, $data) {
        $this->setFillColor(255, 0, 0);
        $this->setTextColor(255);
        $this->setDrawColor(128, 0, 0);
        $this->setLineWidth(0.3);
        $this->setFont('', 'B');
        
        // Array of column widths
        $widths = array(10, 30, 10, 55, 40, 15, 40, 40, 30);
        
        // Send headers to document
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($widths[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        
        $this->Ln();
        
        // Color and font restoration
        $this->setFillColor(175);
        $this->setTextColor(0);
        $this->setFont('');
        
        // Spool out the data from $data
        $fill = 0; // Row backgrounds
        
        foreach ($data as $row) {
            for ($i = 0; $i < count($row); $i++) {
                $this->Cell($widths[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
            }
            $fill = !$fill;
            $this->Ln();
        }
        
        $this->Cell(array_sum($widths), 0, '', 'T');
    }
}

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

// SQL query to retrieve data from the Baseball Table
$sql = "SELECT * FROM my_table";

// Execute SQL query
$result = $conn->query($sql);

// Initialize PDF with landscape orientation
$pdf = new TablePDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 12);

// Table header
$header = array('ID', 'Name', 'Age', 'Email', 'Registration Date', 'Active', 'Role', 'Team', 'Games Played');
$pdf->buildTable($header, []);

// Table data
if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $row['registration_date'] = date("Y-m-d", strtotime($row['registration_date'])); // Format registration date
        $data[] = array(
            $row['id'],
            $row['name'],
            $row['age'],
            $row['email'],
            $row['registration_date'],
            $row['is_active'] ? 'Yes' : 'No',
            $row['role'],
            $row['team'],
            $row['games_played']
        );
    }
    $pdf->buildTable([], $data);
} else {
    $pdf->Cell(200, 10, 'No data found', 1, 1, 'C');
}

// Output PDF
$pdf->Output();

// Close connection
$conn->close();
?>
