<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Step 1: Connect to MySQL database
$mysqli = new mysqli("localhost", "root", "Sreelakshmids@1234", "ddd@gmail.com");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form is submitted
if(isset($_POST['admis_no']) && isset($_POST['password'])) {
    // Get user input
    $admission_number = $_POST['admis_no'];
    $password = $_POST['password'];

    // Step 2: Query the database to check if the user exists
    $sql = "SELECT * FROM user WHERE admis_no = '$admission_number' AND password = '$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // User exists, grant access
        // Start a session and store user data if needed
        session_start();
        $_SESSION['admis_no'] = $admission_number;
        // Redirect to the buysell.html page
        header("Location: buysell.html");
        exit();
    } else {
        // User does not exist or invalid credentials
        echo "Invalid credentials. Please try again.";
    }
}

// Close database connection
$mysqli->close();
?>
