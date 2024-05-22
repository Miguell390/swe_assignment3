<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$feedback_message = '';
$message_type = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "db";
    $username = "admin";
    $password = "admin";
    $dbname = "restaurant";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //retrieve form data and set default values for empty fields
    $name = isset($_POST['name']) && !empty(trim($_POST['name'])) ? $conn->real_escape_string(trim($_POST['name'])) : 'N/A';
    $rating = isset($_POST['rating']) && !empty(trim($_POST['rating'])) ? $conn->real_escape_string(trim($_POST['rating'])) : 'N/A';
    $food = isset($_POST['food']) && !empty(trim($_POST['food'])) ? $conn->real_escape_string(trim($_POST['food'])) : 'N/A';
    $service = isset($_POST['service']) && !empty(trim($_POST['service'])) ? $conn->real_escape_string(trim($_POST['service'])) : 'N/A';

    //insert data into the feedbackReview table
    $sql = "INSERT INTO feedbackReview (name, rating, food, service) VALUES ('$name', '$rating', '$food', '$service')";

    if ($conn->query($sql) === TRUE) {
        $feedback_message = "Thank you for your feedback!";
        $message_type = 'success';
    } else {
        $feedback_message = "Error: " . $sql . "<br>" . $conn->error;
        $message_type = 'error';
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Software Architectures and Design Assignment 3">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP, SWE30003, Feedback, Rate Us">
    <meta name="author" content="Demetre, Kobie, Miguel, Hugh">
    <title>Feedback</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
    <header>
        <a href="Home.html"><img class="banner" src="images/RelaxingKoalaLogoLong.png" alt="Logo"></a>
        <nav>
            <a href="Order.html">Place Order</a>
            <a href="Reservation.html">Book In</a>
            <a href="Feedback.html">Rate Us</a>
        </nav>
    </header>
    <main>
        <h1>Feedback</h1>
        <?php
        if (!empty($feedback_message)) {
            $class = $message_type == 'success' ? 'feedback-message success' : 'feedback-message error';
            echo "<p class='$class'>$feedback_message</p>";
        }
        ?>
        <form action="#" method="post">
            <label for="name">Your Name (Optional):</label>
            <input type="text" id="name" name="name"><br>

            <label for="rating">Overall Experience Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">Select Rating</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Fair">Fair</option>
                <option value="Poor">Poor</option>
            </select><br>

            <label for="food">Feedback on Food (Optional):</label>
            <textarea id="food" name="food" rows="5"></textarea><br>

            <label for="service">Feedback on Service (Optional):</label>
            <textarea id="service" name="service" rows="5"></textarea><br>

            <button type="submit">Submit Feedback</button>
        </form>
    </main>
</body>
</html>
