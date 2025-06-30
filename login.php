<?php include("db/config.php"); session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="login" value="Login">
</form>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    




    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $row;
            header("Location: dashboard.php");
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "User not found!";
    }

    if (password_verify($pass, $row['password'])) {
    $_SESSION['user'] = $row;
    if ($row['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: dashboard.php");
    }
}
}
?>
<p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
