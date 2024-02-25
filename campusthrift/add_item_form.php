<!-- add_item_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Add Item</h1>
    <form action="add_item.php" method="post">
        <div>
            <label for="item_name" style="padding:48px;">Item Name:</label>
            <input type="text" id="item_name" name="item_name" required>
        </div>
        <div>
            <label for="item_desc" style="padding:30px;">Item Description:</label>
            <input type="text" id="item_desc" name="item_desc" required>
        </div>
        <div>
            <label for="item_price" style="padding:70px;">Price:</label>
            <input type="number" id="item_price" name="item_price" step="0.01" required>
        </div>
        <div  style="padding: 20px" >
            <input type="submit" value="Add Item">
        </div>
    </form>
</body>
</html>
