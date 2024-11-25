<?php
include 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to select the user by email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Direct password comparison without hashing
        if ($password === $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on user role
            if ($row['role'] == 'admin') {
                header('Location: admin.php'); // Admin dashboard
            } elseif ($row['role'] == 'professor') {
                header('Location: prof_dashboard.php'); // Professor dashboard
            } else {
                header('Location: studt_dashboard.php'); // Student dashboard
            }
            exit; // Important to prevent further script execution after redirect
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="index.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Password:</label><br>
        <div style="position: relative;">
            <input type="password" id="password" name="password" required>
            <span id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                <i class="fa-regular fa-eye-slash"></i>
            </span>
        </div><br><br>

        <button type="submit">Login</button>
    </form>
    <h2><a href="register.php">Register</a></h2>
    <h2><a href="home.php">Home</a></h2>

    <script>
    // JavaScript for toggle functionality
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function () {
        // Toggle the input type between 'password' and 'text'
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        // Toggle the icon
        this.innerHTML = type === "password" 
            ? '<i class="fa-regular fa-eye-slash"></i>' 
            : '<i class="fa-regular fa-eye"></i>';
    });
    </script>
</body>
</html>
