<?php
include 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if ($conn->query($sql)) {
        $message = "<p style='color:green'>Register complete!</p>";
    } else {
        $message = "<p style='color:red'>Error: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; margin: 0 auto; }
        .nav { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php">Login</a>
        </div>
        
        <h2>Register</h2>
        <?= $message ?>
        <form method="POST">
            <label>Username: </label>
            <input type="text" name="username" required><br><br>
            
            <label>Password: </label>
            <input type="password" name="password" required><br><br>
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>