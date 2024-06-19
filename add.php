<?php
include 'config.php';

$pname = $_POST['pname'];
$pdes = $_POST['pdes'];
$bname = $_POST['bname'];
$pprice = $_POST['pprice'];

// SQL query to insert data into the product table
$sql = "INSERT INTO awdtb (pname,pdes,pbrand, pprice) VALUES ('$pname',' $pdes','$bname', $pprice)";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record inserted')</script>";
    echo "<script>window.location.href = 'practical_09.php';</script>";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
