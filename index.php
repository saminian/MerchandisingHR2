<?php
session_start();

$servername = "Localhost";
$username = "hr2_gwam"; 
$password = "gwam"; 
$dbname = "hr2_gwam"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Fetch the admin user from the database
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    
    if ($admin && password_verify($admin_password, $admin['password'])) {
        // Set session variables to indicate the admin is logged in
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $admin_username;
        header("Location: dashboard.php"); 
        exit();
    } else {
       
        $error = "Invalid username or password";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>     
</head>
<body>
    <div class="login-container">
        <div class="login-image">
            <img src="img/gwamlogo.png" alt="" height="250">
        </div> 
        
        <div class="login-form">
            <span class="title">
            </span>

            
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
