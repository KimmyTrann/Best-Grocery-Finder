<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO Users (username, password) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $password);
    
    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username already taken";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Welcome Page</h1>
            <p>Sign up to continue access</p>
            <p><a href="index.php" style="color: white;">Back to Home</a></p>
        </div>
        <div class="right-panel">
            <h2>Register</h2>
            <?php if (isset($error)): ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
            <div class="social-buttons">
                <button class="twitter">Sign Up with Twitter</button>
                <button class="facebook">Sign Up with Facebook</button>
            </div>
        </div>
    </div>
</body>
</html>
