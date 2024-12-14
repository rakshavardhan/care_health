<?php
// Database credentials
$servername = "localhost"; // or your server
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "cure"; // your database name

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data and sanitize
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $feedback = htmlspecialchars(trim($_POST['feedback']));

    // Validate the input
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($feedback)) {
        // Prepare the SQL query to insert the feedback into the database
        $stmt = $conn->prepare("INSERT INTO feedback (email, feedback_here) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $feedback);

        // Execute the query
        if ($stmt->execute()) {
            $successMessage = "Thank you for your feedback!";
            // Redirect after successful submission
            header("Location: feedback.php?success=true");  // Redirect to the same page with a success query parameter
            exit();
        } else {
            // Log the error for debugging
            error_log("Error: " . $stmt->error);
            $errorMessage = "There was an error saving your feedback. Please try again later.";
        }

        // Close the statement
        $stmt->close();
    } else {
        $errorMessage = "Please provide a valid email and feedback.";
    }
}

// Close the database connection
$conn->close();
?>
