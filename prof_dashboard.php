<?php
include 'db_config.php';
session_start();

// Redirect if user is not logged in or is not a professor
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'professor') {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit;
}

// Initialize message variable
$message = "";

// Handle feedback submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $feedback_type = $_POST['feedback_type'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO feedback (user_id, feedback_type, category, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $feedback_type, $category, $description);

    if ($stmt->execute()) {
        $message = "<p style='color: green;'>Feedback submitted successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close(); // Close the prepared statement
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Professor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .message {
            margin: 20px 0; /* Margin for spacing */
            padding: 10px; /* Padding for comfort */
            border-radius: 4px; /* Rounded corners */
            text-align: center; /* Center align */
        }
    </style>
</head>
<body>
<h2>Submit Feedback</h2>

    <h2>Professor Dashboard</h2>
    <div class="message">
        <?php echo $message; ?>
    </div>
    
    <form method="POST" action="prof_dashboard.php">
        <label>Feedback Type:</label><br>
        <select name="feedback_type" required>
            <option value="Course Materials">Course Materials</option>
            <option value="Lab Equipment">Lab Equipment</option>
            <option value="IT Infrastructure">IT Infrastructure</option>
            <option value="Other">Other</option>
        </select><br>

        <label>Category:</label><br>
        <select name="category" required>
            <option value="General Feedback">General Feedback</option>
            <option value="Specific Issue">Specific Issue</option>
        </select><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <button type="submit">Submit Feedback</button>
    </form>

    <h3><a href="index.php">Logout</a></h3>
    <h3><a href="home.php">Home</a></h3>
</body>
</html>
