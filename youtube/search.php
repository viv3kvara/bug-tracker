<!DOCTYPE html>
<html>
<head><title>YouTube Debugging Videos</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h2>📺 YouTube Debugging Videos</h2>
<form action="result.php" method="GET">
    Enter Topic: <input type="text" name="q" required>
    <input type="submit" value="Search">
</form>

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
