<?php
$servername = "db";
$username = "admin";
$password = "admin";
$dbname = "restaurant";

header('Content-Type: application/json');

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed: " . $conn->connect_error]);
    exit();
}

$sql = "SELECT menuId, menuName, price FROM MenuItems";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    $conn->close();
    exit();
}

$menuItems = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
} else {
    echo json_encode(["error" => "No results found"]);
    $conn->close();
    exit();
}

$conn->close();
echo json_encode($menuItems);
?>
