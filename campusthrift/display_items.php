<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Items</title>
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
    <h1>Available Items</h1>

    <?php
    // Step 2: Connect to MySQL database
    $mysqli = new mysqli("localhost", "root", "Sreelakshmids@1234", "ddd@gmail.com");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Step 3: Retrieve Items with status 'Available'
    $sql = "SELECT item_name, item_desc, item_price, status FROM item WHERE status = 'Available'";
    $result = $mysqli->query($sql);

    // Step 4: Display Items
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $item_name = htmlspecialchars($row["item_name"]);
            $item_desc = htmlspecialchars($row["item_desc"]);
            $item_price = htmlspecialchars($row["item_price"]);

            echo "<div class='item'>";
           // echo "<img src='" . $row["item_image"] . "' alt='" . $row["item_name"] . "'>";
            echo "<h3>" . $row["item_name"] . "</h3>";
            echo "<p>Description: " . $row["item_desc"] . "</p>";
            echo "<p>Price: Rs." . $row["item_price"] . "</p>";
            echo "<p>Status: " . $row["status"] . "</p>";
            echo "<p><a href='generate_bill.php?item_name=$item_name&item_price=$item_price'>Generate Bill</a></p>";
            echo "</div>";
        }
    } else {
        echo "No available items.";
    }

    // Close database connection
    $mysqli->close();
    ?>

    <p><a href="buysell.html">Back to Buy/Sell</a></p>
</body>
</html>
