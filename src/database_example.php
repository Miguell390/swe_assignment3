<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Example</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Stock Inventory</h2>
    <table>
        <tr>
            <th>Stock Name</th>
            <th>Supplier</th>
        </tr>
        <?php
        $servername = "db";
        $username = "admin";
        $password = "admin";
        $dbname = "restaurant";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT StockName, Supplier FROM StockInventory";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["StockName"]."</td><td>".$row["Supplier"]."</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>

    <h2>Menu Items</h2>
    <table>
        <tr>
            <th>Menu Name</th>
            <th>Price</th>
        </tr>
        <?php
       
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT menuName, price FROM MenuItems";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["menuName"]."</td><td>$".$row["price"]."</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>



    <h2>Feedback review</h2>
    <table>
        <tr>
            <th>rating number</th>
            <th>Feedback Notes</th>
        </tr>
        <?php
        
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT rating, feedbackNotes FROM FeedbackReview";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["rating"]."</td><td>".$row["feedbackNotes"]."</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
