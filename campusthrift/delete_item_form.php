<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Items</title>
</head>
<body>
    <h1>Delete Items</h1>

    <form action="delete_item.php" method="post">
        <label for="item">Select item to delete:</label>
        <select name="item" id="item">
            <?php
            // Start a session to access session variables
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
            $sql = "SELECT item_name FROM item WHERE admis_no = '$user_id'";
            $result = $mysqli->query($sql);

            // Display items in dropdown menu
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["item_name"] . "'>" . $row["item_name"] . "</option>";
                }
            } else {
                echo "<option value=''>No items found</option>";
            }

            // Close database connection
            $mysqli->close();
            ?>
        </select>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
