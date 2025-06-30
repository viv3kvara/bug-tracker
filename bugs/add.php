<?php
include("../db/config.php");
session_start();
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Add Bug</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Report a Bug</h2>
<form method="POST">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description" required></textarea><br>
    Priority:
    <select name="priority">
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
    </select><br>
    <input type="submit" name="submit" value="Report Bug">
</form>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO bugs(title, description, priority, created_by) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $_POST['title'], $_POST['description'], $_POST['priority'], $user['id']);
    $stmt->execute();
    echo "Bug Reported Successfully!";
}
?>

<?php
// Show dashboard link based on user role
if (isset($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
    $dashboard = ($role == 'admin') ? '../admin/dashboard.php' : '../dashboard.php';
    echo "<p style='margin-top:20px;'><a href='$dashboard'>⬅️ Back to Dashboard</a></p>";
}
?>
</body>
</html>
