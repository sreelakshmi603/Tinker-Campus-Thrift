<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Page</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .item {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .item img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-bottom: 10px;
        }
        .item h3 {
            margin-top: 0;
        }
        .item p {
            margin-bottom: 10px;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h1>Owned Items</h1>
<button onclick="location.href='add_item_form.php'" style="flex: right; padding: 10px 20px; font-size: 16px;;">Add Items</button>
<button onclick="location.href='delete_item_form.php'" style="flex: left; padding: 10px 20px; font-size: 16px;;">Delete Items</button>

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

    // Retrieve items corresponding to the logged-in user
    $user_id = $_SESSION['admis_no'];
    $sql = "SELECT item_name, item_price, status FROM item WHERE admis_no = '$user_id'";
    $result = $mysqli->query($sql);

    // Display items
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<div class='item'>";
           // echo "<img src='" . $row["item_image"] . "' alt='" . $row["item_name"] . "'>";
            echo "<h3>" . $row["item_name"] . "</h3>";
            echo "<p>Status: " . $row["status"] . "</p>";
            echo "<p>Price: Rs." . $row["item_price"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No items found for the logged-in user.";
    }

    // Close database connection
    $mysqli->close();
    ?>
</body>
</html>