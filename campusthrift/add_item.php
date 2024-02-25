<!-- add_item.php -->

<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['admis_no'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

// Connect to MySQL database
$mysqli = new mysqli("localhost", "root", "Sreelakshmids@1234", "ddd@gmail.com");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Extract item details from the form submission
$item_name = $_POST['item_name'];
$item_desc = $_POST['item_desc'];
$item_price = $_POST['item_price'];
$user_id = $_SESSION['admis_no'];

// Prepare SQL statement to insert item into database
$sql = "INSERT INTO item (item_name, item_desc, item_price, admis_no, status) VALUES ('$item_name', '$item_desc', '$item_price', '$user_id', 'Available')";

// Execute SQL statement
if ($mysqli->query($sql) === TRUE) {
    echo "<script>alert('Item added successfully.')</script>";
    echo "<script>setTimeout(function() { window.location.href = 'seller_page.php'; }, 2000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

// Close database connection
$mysqli->close();
?>
