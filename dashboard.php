<?php session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Welcome, <?= $user['name']; ?> (<?= $user['role']; ?>)</h2>
<ul>
    <li><a href="bugs/add.php">Report Bug</a></li>
    <li><a href="bugs/list.php">View Bugs</a></li>
    <li><a href="quiz/take.php">Take Quiz</a></li>
    <li><a href="chatbot/index.php">Chat with BugBot</a></li>
    <li><a href="youtube/search.php">Watch Debugging Videos</a></li>
    <li><a href="logout.php">Logout</a></li>

    <li><a href="change-password.php">Change Password</a></li>

</ul>
</body>
</html>
