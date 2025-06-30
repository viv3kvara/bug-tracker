<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head><title>Admin Dashboard</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>Welcome Admin <?= $user['name']; ?></h2>
<ul>
    <li><a href="../quiz/add-question.php">Add Quiz Questions</a></li>
    <li><a href="../bugs/list.php">View All Bugs</a></li>
    <li><a href="../logout.php">Logout</a></li>
</ul>
</body>
</html>
