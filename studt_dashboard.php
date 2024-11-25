<?php
include 'db_config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $feedback_type = $_POST['feedback_type'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO feedback (user_id, feedback_type, category, description) VALUES ('$user_id', '$feedback_type', '$category', '$description')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Feedback submitted successfully!";
    } else {
        $success_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Submit Feedback</h2>

    <!-- Display success message at the top -->
    <?php if (!empty($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <form method="POST" action="studt_dashboard.php">
        <label>Feedback Type:</label><br>
        <select name="feedback_type" required>
            <option value="Suggestion">Suggestion</option>
            <option value="Issue">Issue</option>
        </select><br>

        <label>Category:</label><br>
        <select name="category" required>
            <option value="Equipment">Equipment</option>
            <option value="Software">Software</option>
            <option value="Environment">Environment</option>
        </select><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        
        <button type="submit">Submit Feedback</button>
    </form>

    <h2><a href="logout.php">Logout</a></h2>
    <h2><a href="home.php">Home</a></h2>

</body>
</html>
