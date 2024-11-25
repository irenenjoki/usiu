<?php
include 'db_config.php';
session_start();

// Define the secret code for admin access
$admin_secret_code = "cameroon";

// Check if the user is logged in and has the admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}

// Always require the secret code
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['secret_code'])) {
    if ($_POST['secret_code'] === $admin_secret_code) {
        // Only show the admin page content if the code is correct
        $code_verified = true;
    } else {
        echo "<p style='color: red;'>Incorrect secret code!</p>";
    }
}

if (!isset($code_verified)) {
    // Display the secret code form if the code is not entered or is incorrect
    echo '
    <div class="center-container">
    <form method="POST" action="admin.php">
    <label for="secret_code">Enter Secret Code:</label><br>
    
    <div style="position: relative; display: inline-block;">
    <input type="password" id="secret_code" name="secret_code" required style="width: 300px; height: 40px; font-size: 16px;">
    <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="toggleVisibility()">
        <i class="fa-regular fa-eye-slash"></i>
    </span>
</div><br><br>
<button type="submit" style="width: 100%; max-width: 150px; height: 40px; font-size: 16px;">Submit</button>
</form>

</div>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: Arial, sans-serif;
        padding: 20px;
        background-image: url("https://images.pexels.com/photos/7135016/pexels-photo-7135016.jpeg?auto=compress&cs=tinysrgb&w=600");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-color: #f0f0f0;
    }

    .center-container {
        text-align: center;
        font-size: x-large;
    }
</style>
<script>
    function toggleVisibility() {
        const secretCodeInput = document.getElementById("secret_code");
        const toggleIcon = document.querySelector("#togglePassword i"); // Select the icon inside the span
        
        // Toggle the input type
        if (secretCodeInput.type === "password") {
            secretCodeInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            secretCodeInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>

    ';
    exit;
}

// Query feedback records if the correct secret code is provided
$sql = "SELECT feedback.id, users.name, feedback.feedback_type, feedback.category, feedback.description, feedback.status, feedback.created_at
        FROM feedback
        JOIN users ON feedback.user_id = users.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .table-container {
            width: 80%;
            max-width: 1200px;
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Feedback Management</h2>
    
        <table>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Feedback Type</th>
                <th>Category</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['feedback_type'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No feedback found</td></tr>";
            }
            ?>
        </table>

        <h2><a href="logout.php">Logout</a></h2>
    </div>
</body>
</html>
