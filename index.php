<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'db.php';

if (isset($_GET['logout'])) {
    setcookie('user', '', time() - 3600, '/');
    header('Location: index.php');
    exit();
}

if (isset($_COOKIE['user'])) {
    header('Location: welcome.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        setcookie('user', $username, time() + 3600, '/');
        header('Location: welcome.php');
        exit();
    } else {
        $error = "Неверные данные!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; margin: 0 auto; }
        .nav { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="register.php">Register</a>
        </div>
        
        <h2>Login</h2>
        <?php if ($error): ?>
            <p style='color:red'><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <label>Username: </label>
            <input type="text" name="username" required><br><br>
            
            <label>Password: </label>
            <input type="password" name="password" required><br><br>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>