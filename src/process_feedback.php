<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$feedback_message = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

    // Retrieve and validate form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $rating = isset($_POST['rating']) ? trim($_POST['rating']) : '';
    $food = isset($_POST['food']) ? trim($_POST['food']) : '';
    $service = isset($_POST['service']) ? trim($_POST['service']) : '';

    // Validate name (optional)
    if (!empty($name) && !preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors[] = "Only letters and white space allowed in the name.";
    }

    // Validate rating (required)
    if (empty($rating)) {
        $errors[] = "Rating is required.";
    } else if (!in_array($rating, ['Excellent', 'Very Good', 'Good', 'Fair', 'Poor'])) {
        $errors[] = "Invalid rating value.";
    }

    // Validate food feedback (optional)
    if (!empty($food) && strlen($food) > 500) {
        $errors[] = "Food feedback must be less than 500 characters.";
    }

    // Validate service feedback (optional)
    if (!empty($service) && strlen($service) > 500) {
        $errors[] = "Service feedback must be less than 500 characters.";
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        $name = $conn->real_escape_string($name);
        $rating = $conn->real_escape_string($rating);
        $food = $conn->real_escape_string($food);
        $service = $conn->real_escape_string($service);

        $sql = "INSERT INTO feedbackReview (name, rating, food, service) VALUES ('$name', '$rating', '$food', '$service')";

        if ($conn->query($sql) === TRUE) {
            $feedback_message = "Thank you for your feedback!";
        } else {
            $feedback_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Combine errors into a single feedback message
        $feedback_message = implode("<br>", $errors);
    }

    $conn->close();
    header('Location: feedback.php?message=' . urlencode($feedback_message));
    exit();
}
?>
