<?php

    // Define the StockInventory class
    class StockInventory {
        public $stockName;
        public $supplier;

        function __construct($stockName, $supplier) {
            $this->stockName = $stockName;
            $this->supplier = $supplier;
        }
    }

// 
function storeStockInventory($mysqli, $stockInventory) {
    $stockName = $stockInventory->stockName;
    $supplier = $stockInventory->supplier;

    $query = "INSERT INTO StockInventory (StockName, Supplier) VALUES ('$stockName', '$supplier')";

    if ($mysqli->query($query) === TRUE) {
        echo "Stock inventory stored successfully!";
    } else {
        echo "Error storing stock inventory: " . $mysqli->error;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Retrieve data from the POST request
    $stockName = $_POST['stockName'];
    $supplier = $_POST['supplier'];

    $mysqli = new mysqli("db", "admin", "admin", "restaurant");

    // Check for connection errors
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stockInventory = new StockInventory($stockName, $supplier);
    storeStockInventory($mysqli, $stockInventory);


    

        $mysqli->close();


        }

        

// $stockName = $_POST['stockName'];
// $supplier = $_POST['supplier'];

//$stockInventory = new StockInventory($stockName, $supplier);

// Store stock inventory instance
//storeStockInventory($mysqli, $stockInventory);

// Close the connection


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock Inventory</title>
</head>
<body>
    <h2>Add Stock Inventory</h2>
    <form action="#" method="post">
        <label for="stockName">Stock Name:</label><br>
        <input type="text" id="stockName" name="stockName" required><br><br>
        <label for="supplier">Supplier:</label><br>
        <input type="text" id="supplier" name="supplier" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

