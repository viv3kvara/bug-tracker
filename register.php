<?php include("db/config.php"); ?>
<!DOCTYPE html>
<html>
<head><title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Register</h2>
<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    Role: 
    <select name="role">
        <option value="developer">Developer</option>
        <option value="tester">Tester</option>
    </select><br>
    <input type="submit" name="submit" value="Register">
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users(name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);
    $stmt->execute();

    echo "Registered Successfully!";
}
?>
<p>Don't have an account? <a href="login.php">login here</a></p>
</body>
</html>
