<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_COOKIE['user'])) {
    header('Location: index.php');
    exit();
}

include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 500px; margin: 0 auto; }
        .nav { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="index.php?logout=1">Logout</a>
        </div>
        
        <h2>Hello, <?= htmlspecialchars($_COOKIE['user']) ?>!</h2>
        
        <?php
        if (isset($_GET['show_users'])) {
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<h3>All users:</h3>";
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($row['username']) . "</li>";
                }
                echo "</ul>";
            }
        }
        ?>
        
        <p><a href="welcome.php?show_users=1">Show all users</a></p>
    </div>
</body>
</html>