<?php
@include 'config.php';

function adminLogin($name, $password)
{
    $adminName = 'admin';
    $adminPassword = '1234';

    if ($name == $adminName && $password == $adminPassword) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (adminLogin($name, $password)) {
        header("Location: adminDashboard.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="form-container">
        <form action="adminDashboard.php" method="post">
            <h3>Admin Login</h3>
            <input type="text" name="name" required placeholder="Enter your Username">
            <input type="password" name="password" required placeholder="Type your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>If you are a Staff member ?<a href="staff_login.php">Click here</a></p>
        </form>

    </div>
</body>

</html>