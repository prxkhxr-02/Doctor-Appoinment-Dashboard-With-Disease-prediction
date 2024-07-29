<!-- save_feedback.php -->
<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input (example)
    $username = htmlspecialchars($_POST["username"]);
    $doctorname = htmlspecialchars($_POST["doctorname"]);
    $feedback = htmlspecialchars($_POST["feedback"]);

    // Save feedback to database
    include("../connection.php"); // Ensure your database connection file is correctly included

    // Assuming your database connection is already established
    $sql = "INSERT INTO feedback (username, doctorname, feedback) VALUES (?, ?, ?)";
    $stmt = $database->prepare($sql);
    $stmt->bind_param("sss", $username, $doctorname, $feedback);

    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $database->close(); // Close the database connection
} else {
    // Redirect if the form was not submitted via POST method
    header("Location: submit_feedback.php");
    exit();
}
?>
