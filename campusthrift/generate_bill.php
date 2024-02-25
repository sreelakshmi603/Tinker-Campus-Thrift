<?php
// Start the session to access session variables
session_start();

// Check if the required parameters are passed
if(isset($_GET['item_name']) && isset($_GET['item_price']) && isset($_SESSION['admis_no'])) {
    // Get parameters from URL
    $item_name = $_GET['item_name'];
    $price = $_GET['item_price'];
    $admis_no = $_SESSION['admis_no'];

    // Connect to MySQL database
    $mysqli = new mysqli("localhost", "root", "Sreelakshmids@1234", "ddd@gmail.com");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $sql_update = "UPDATE item SET status = 'Booked' WHERE item_name = ? AND item_price = ?";
    $stmt_update = $mysqli->prepare($sql_update);
    $stmt_update->bind_param("ss", $item_name, $price);
    
    // Execute SQL statement
    if ($stmt_update->execute()) {
        // Status updated successfully
        echo "Item status updated to Booked.\n";
    
        // Generate bill content
        $bill_content = "Item: $item_name\n";
        $bill_content .= "Owner ID: $admis_no\n";
        $bill_content .= "Buyer ID: $admis_no\n";
        $bill_content .= "Price: Rs. $price\n";
        $bill_content .= "Date and Time: " . date("Y-m-d H:i:s") . "\n";

        // Output bill content
        //echo "<pre>$bill_content</pre>";

        // Allow download
        header('Content-Disposition: attachment; filename="bill.txt"');
        header('Content-Type: text/plain');
        echo $bill_content;
    } else {
        //echo "Error updating item status: " . $mysqli->error;
        echo "Error updating item status: " . $stmt_update->error;
    }
    $stmt_update->close();
    // Close database connection
    $mysqli->close();

} else {
    echo "Error: Required parameters are missing.";
}
?>
