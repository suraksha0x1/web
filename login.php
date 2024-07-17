<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'suraksha@123', 'website') or die('Unable to connect');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admins.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form id="login-form" method="POST">
            <div class="input-group">
                <label for="admin-name">Admin Name</label>
                <input type="text" id="admin-name" name="admin_name" placeholder="Enter admin name" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" value="login" name="login">Login</button>
        </form>
        <div id="error-message" class="error-message"></div>
    </div>

    <?php 
    if(isset($_POST['login'])){
        $admin_name = $_POST['admin_name'];
        $password = $_POST['password'];
        
        $query5 = "SELECT * FROM admin WHERE admin_name='$admin_name' AND password='$password'";
        $select = mysqli_query($conn, $query5);
        $row = mysqli_fetch_array($select);

        if(is_array($row)){
            $_SESSION["admin_name"] = $row['admin_name'];
            $_SESSION["password"] = $row['password'];
            header("Location: admin.php");
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid username or password");';
            echo 'window.location.href = "login.php";';
            echo '</script>';
        }
    }

    if(isset($_SESSION["admin_name"])){
        header("Location: admin.php");
        exit();
    }
    ?>
</body>
</html>
