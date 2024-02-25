<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['admis_no'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

// Check if item is selected for deletion
if(isset($_POST['item'])) {
    // Get the selected item name
    $item_name = $_POST['item'];

    // Connect to MySQL database
    $mysqli = new mysqli("localhost", "root", "Sreelakshmids@1234", "ddd@gmail.com");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare SQL statement to delete the item
    $sql = "DELETE FROM item WHERE item_name = '$item_name'";

    // Execute SQL statement
    if ($mysqli->query($sql) === TRUE) {
        echo "Item deleted successfully.";
    } else {
        echo "Error deleting item: " . $mysqli->error;
    }

    // Close database connection
    $mysqli->close();
} else {
    echo "Error: No item selected for deletion.";
}
?>
