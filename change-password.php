<?php
session_start();
include("db/config.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$msg = "";
if (isset($_POST['change'])) {
    $userId = $_SESSION['user']['id'];
    $current = $_POST['current'];
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];

    $q = $conn->query("SELECT password FROM users WHERE id = $userId");
    $row = $q->fetch_assoc();

    if (!password_verify($current, $row['password'])) {
        $msg = "❌ Current password is incorrect!";
    } elseif ($new !== $confirm) {
        $msg = "❌ New passwords do not match!";
    } else {
        $hashed = password_hash($new, PASSWORD_DEFAULT);
        $conn->query("UPDATE users SET password = '$hashed' WHERE id = $userId");
        $msg = "✅ Password changed successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>🔐 Change Password</h2>
<form method="POST">
    Current Password: <input type="password" name="current" required><br>
    New Password: <input type="password" name="new" required><br>
    Confirm New Password: <input type="password" name="confirm" required><br>
    <button type="submit" name="change">Change Password</button>
</form>

<?php if ($msg) echo "<p style='color:red;'>$msg</p>"; ?>

<p><a href="dashboard.php">⬅️ Back to Dashboard</a></p>
</body>
</html>
